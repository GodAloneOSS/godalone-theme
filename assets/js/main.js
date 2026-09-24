/* GodAlone Premium — front-end interactions
   Menu · theme toggle · Firebase login · newsletter · reveal · modal · float */
(function () {
  "use strict";
  var $ = function (id) { return document.getElementById(id); };
  var CFG = window.GA || {};

  document.addEventListener("DOMContentLoaded", function () {

    /* ---------- Hamburger menu ---------- */
    var menuBtn = $("ghMenuBtn"), menu = $("ghMenu");
    if (menuBtn && menu) {
      menuBtn.addEventListener("click", function (e) { e.stopPropagation(); menu.classList.toggle("show"); });
    }

    /* ---------- Theme toggle (default = night / navy) ---------- */
    var themeBtn = $("ghThemeBtn");
    function syncThemeIcon() {
      if (themeBtn) themeBtn.textContent = document.documentElement.classList.contains("theme-day") ? "☀️" : "🌙";
    }
    syncThemeIcon();
    if (themeBtn) {
      themeBtn.addEventListener("click", function () {
        var day = document.documentElement.classList.toggle("theme-day");
        try { localStorage.setItem("gaTheme3", day ? "day" : "night"); } catch (e) {}
        syncThemeIcon();
      });
    }

    /* ---------- Header shadow on scroll ---------- */
    var hdr = $("ghHdr");
    addEventListener("scroll", function () {
      if (hdr) hdr.classList.toggle("scrolled", scrollY > 12);
      var top = $("ghTop"); if (top) top.classList.toggle("show", scrollY > 600);
    }, { passive: true });

    /* ---------- Back to top ---------- */
    var topBtn = $("ghTop");
    if (topBtn) topBtn.addEventListener("click", function () { scrollTo({ top: 0, behavior: "smooth" }); });

    /* ---------- Purchase modal ---------- */
    var pop = $("ghPopup");
    function openPop(e) { if (e) e.preventDefault(); if (pop) { pop.classList.add("show"); if (menu) menu.classList.remove("show"); } }
    function closePop() { if (pop) pop.classList.remove("show"); }
    Array.prototype.forEach.call(document.querySelectorAll(".gh-buy"), function (el) {
      el.style.cursor = "pointer";
      el.addEventListener("click", openPop);
    });
    if ($("ghPopupX")) $("ghPopupX").addEventListener("click", closePop);
    if (pop) pop.addEventListener("click", function (e) { if (e.target === pop) closePop(); });
    addEventListener("keydown", function (e) { if (e.key === "Escape") closePop(); });

    /* ---------- Close popovers on outside click ---------- */
    document.addEventListener("click", function (e) {
      if (menuBtn && menu && !menuBtn.contains(e.target) && !menu.contains(e.target)) menu.classList.remove("show");
      var uw = $("ghUserw"), um = $("ghUmenu");
      if (uw && um && !uw.contains(e.target)) { um.classList.remove("show"); }
    });

    /* ---------- Reveal on scroll ---------- */
    var rev = document.querySelectorAll(".reveal");
    if (rev.length && "IntersectionObserver" in window) {
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (x) { if (x.isIntersecting) { x.target.classList.add("in"); io.unobserve(x.target); } });
      }, { threshold: 0.12, rootMargin: "0px 0px -40px 0px" });
      Array.prototype.forEach.call(rev, function (el, i) {
        el.style.transitionDelay = (Math.min(i % 8, 6) * 45) + "ms";
        io.observe(el);
      });
      setTimeout(function () {
        document.querySelectorAll(".reveal:not(.in)").forEach(function (el) { el.classList.add("in"); });
      }, 1800);
    } else {
      Array.prototype.forEach.call(rev, function (el) { el.classList.add("in"); });
    }

    /* ---------- Firebase Google login ---------- */
    var fbOk = false;
    try {
      if (typeof firebase !== "undefined" && CFG.firebase) {
        if (!firebase.apps || !firebase.apps.length) firebase.initializeApp(CFG.firebase);
        fbOk = true;
      }
    } catch (e) { fbOk = false; }

    var signin = $("ghSignin"), userw = $("ghUserw"), chip = $("ghChip"), umenu = $("ghUmenu");
    function applyUser(u) {
      if (!signin) return;
      if (u) {
        signin.style.display = "none";
        if (userw) userw.style.display = "block";
        if ($("ghUnm")) $("ghUnm").textContent = (u.displayName || u.email || "Account").split(" ")[0];
        if ($("ghUfull")) $("ghUfull").textContent = u.displayName || "Signed in";
        if ($("ghUml")) $("ghUml").textContent = u.email || "";
        var av = $("ghAv");
        if (av) {
          if (u.photoURL) { av.innerHTML = '<img src="' + u.photoURL + '" referrerpolicy="no-referrer" alt="">'; }
          else { av.textContent = (u.displayName || u.email || "?").charAt(0).toUpperCase(); }
        }
        var ne = document.querySelector(".ghne");
        if (ne && !ne.value) ne.value = u.email || "";
      } else {
        signin.style.display = "";
        if (userw) userw.style.display = "none";
      }
    }
    if (fbOk) {
      firebase.auth().onAuthStateChanged(applyUser);
      if (signin) signin.addEventListener("click", function () {
        firebase.auth().signInWithPopup(new firebase.auth.GoogleAuthProvider()).catch(function (err) {
          if (err && err.code !== "auth/popup-closed-by-user" && err.code !== "auth/cancelled-popup-request")
            alert("Sign-in failed — please try again.");
        });
      });
      if (chip) chip.addEventListener("click", function (e) { e.stopPropagation(); if (umenu) umenu.classList.toggle("show"); });
      if ($("ghSignout")) $("ghSignout").addEventListener("click", function () {
        firebase.auth().signOut(); if (umenu) umenu.classList.remove("show");
      });
    } else if (signin) {
      signin.addEventListener("click", function () { alert("Sign-in is unavailable right now. Please try again shortly."); });
    }

    /* ---------- Newsletter subscribe ---------- */
    var ft = $("ghFt");
    var form = $("ghNews");
    if (form) form.addEventListener("submit", function (e) {
      e.preventDefault();
      var email = form.querySelector(".ghne").value;
      var btn = form.querySelector(".sub");
      var honey = $("ghHoney");
      var sel = form.querySelector('input[name=newsletter_lang]:checked');
      var lang = sel ? sel.value : "english";
      if (honey && honey.value !== "") { alert("✅ Thank you for subscribing!"); form.reset(); return; }
      var hint = $("ghHint");
      btn.disabled = true; var label = btn.textContent; btn.textContent = "⏳ Subscribing…";
      var fd = new FormData();
      fd.append("action", "newsletter_subscribe");
      fd.append("newsletter_email", email);
      fd.append("newsletter_language", lang);
      fd.append("form_load_time", ft ? ft.value : "0");
      fd.append("website", honey ? honey.value : "");
      fd.append("nonce", CFG.nonce || "");
      fetch(CFG.ajax || "/wp-admin/admin-ajax.php", { method: "POST", body: fd })
        .then(function (r) { return r.json(); })
        .then(function (d) {
          if (hint) { hint.textContent = (d.success ? "✅ " : "❌ ") + d.data; hint.classList.add("show"); }
          if (d.success) form.reset();
          btn.disabled = false; btn.textContent = label;
          
        })
        .catch(function () {
          if (hint) { hint.textContent = "❌ Error subscribing. Please try again."; hint.classList.add("show"); }
          btn.disabled = false; btn.textContent = label;
        });
    });

  });
})();
