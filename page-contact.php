<?php
/**
 * Template Name: Contact Page
 *
 * Auto-loads for the "Contact" page (slug: contact) via the WordPress
 * template hierarchy. Migrated from the old godalone-theme into the
 * GodAlone Premium design system. The contact form posts to a new
 * 'submit_contact_form' AJAX action (added to functions.php); the
 * newsletter form reuses the existing working 'newsletter_subscribe'
 * action, unchanged.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<style>
.ar-verse{font-family:var(--font-ar);direction:rtl;font-size:1.4rem;line-height:2;
  color:var(--gold-bright);text-align:center;margin:0 0 .7em}
.contact-form label{display:block;color:var(--gold-bright);margin-bottom:6px;font-weight:600;font-size:.92rem}
.contact-form input,.contact-form textarea{width:100%;padding:12px;border:2px solid var(--line);
  border-radius:10px;background:var(--panel-2);color:var(--ink);font-size:1rem;font-family:inherit}
.contact-form input:focus,.contact-form textarea:focus{outline:none;border-color:var(--gold);
  box-shadow:0 0 0 3px rgba(216,180,94,.25)}
.contact-form .field{margin-bottom:18px}
.contact-form .req{color:#e0685f}
#formMessage{display:none;padding:14px;border-radius:10px;text-align:center;margin-top:10px;font-weight:600}
.contact-info-card{background:var(--panel-2);padding:22px;border-radius:var(--radius);border:1px solid var(--line);
  text-align:center;transition:.2s}
.contact-info-card:hover{transform:translateY(-4px)}
.contact-info-card .ico{font-size:2.4rem;margin-bottom:8px}
.newsletter-band{background:var(--gold-grad);padding:44px 30px;border-radius:var(--radius-lg);text-align:center}
.newsletter-band h2,.newsletter-band p{color:#1a1206}
.newsletter-form{display:flex;gap:12px;max-width:480px;margin:0 auto;flex-wrap:wrap;justify-content:center}
.newsletter-form input{flex:1;min-width:230px;padding:13px 22px;border:2px solid #1a1206;
  border-radius:25px;font-size:1rem;background:#fff;color:#1a1206}
.newsletter-form button{padding:13px 28px;background:#1a1206;color:var(--gold-bright);
  border:2px solid #1a1206;border-radius:25px;font-weight:700;cursor:pointer;font-size:1rem;transition:.2s}
.newsletter-form button:hover{transform:translateY(-2px)}
</style>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">GodAlone.in</div>
    <h1 class="reveal">📞 Contact Us</h1>
    <p class="hero-sub">We'd love to hear from you. Whether you have questions about
    the Quran, need assistance, or want to share your thoughts, feel free to reach
    out, Insha'Allah.</p>
  </div>
</div>

<section class="blk">
  <div class="wrap">
    <div class="grid grid-2">

      <div class="card">
        <h2 style="margin-bottom:20px">✉️ Send Us a Message</h2>
        <form id="contactForm" class="contact-form" method="post">
          <div class="field">
            <label>Name <span class="req">*</span></label>
            <input type="text" name="contact_name" required>
          </div>
          <div class="field">
            <label>Email <span class="req">*</span></label>
            <input type="email" name="contact_email" required>
          </div>
          <div class="field">
            <label>Phone (Optional)</label>
            <input type="tel" name="contact_phone">
          </div>
          <div class="field">
            <label>Message <span class="req">*</span></label>
            <textarea name="contact_message" rows="5" required></textarea>
          </div>
          <button type="submit" name="submit_contact" class="btn btn-gold" style="width:100%">📤 Send Message</button>
          <div id="formMessage"></div>
        </form>
      </div>

      <div style="display:flex;flex-direction:column;gap:18px">
        <div class="contact-info-card">
          <div class="ico">📞</div>
          <h3 style="margin-bottom:.4rem">Phone</h3>
          <a href="tel:+919566268619" style="color:var(--ink-soft);text-decoration:none">+91 95662 68619</a>
        </div>
        <div class="contact-info-card">
          <div class="ico">✉️</div>
          <h3 style="margin-bottom:.4rem">Email</h3>
          <a href="mailto:info@godalone.in" style="color:var(--ink-soft);text-decoration:none">info@godalone.in</a>
        </div>
        <div class="contact-info-card">
          <div class="ico">💬</div>
          <h3 style="margin-bottom:.4rem">WhatsApp</h3>
          <a href="https://wa.me/919566268619" target="_blank" rel="noopener" style="color:var(--ink-soft);text-decoration:none">Message on WhatsApp</a>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="blk" style="padding-top:0">
  <div class="wrap">
    <div class="newsletter-band">
      <h2 style="margin-bottom:10px">📧 Subscribe to Our Newsletter</h2>
      <p style="margin-bottom:24px">Receive weekly insights about the Quran and Submission, Insha'Allah.</p>
      <form id="newsletterForm" class="newsletter-form">
        <input type="email" name="newsletter_email" placeholder="Your email address" required>
        <button type="submit">Subscribe</button>
      </form>
      <p style="margin-top:16px;font-size:.9rem;opacity:.85">Join thousands of Submitters worldwide • Ma Sha Allah</p>
    </div>
  </div>
</section>

<section class="verse">
  <div class="wrap">
    <p class="ar-verse">إِيَّاكَ نَعْبُدُ وَإِيَّاكَ نَسْتَعِينُ<br>اهْدِنَا الصِّرَاطَ الْمُسْتَقِيمَ</p>
    <blockquote>"You alone we worship. You alone we ask for help. Guide us in the right path."</blockquote>
    <cite>Quran 1:5-6</cite>
  </div>
</section>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const formData = new FormData(this);
  formData.append('action', 'submit_contact_form');
  formData.append('nonce', '<?php echo wp_create_nonce('contact_form_nonce'); ?>');

  const messageDiv = document.getElementById('formMessage');
  const submitBtn = this.querySelector('button[type="submit"]');
  const form = this;

  submitBtn.disabled = true;
  submitBtn.innerHTML = '⏳ Sending...';

  fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
    method: 'POST',
    body: formData
  })
  .then(function(response) { return response.json(); })
  .then(function(data) {
    messageDiv.style.display = 'block';
    if (data.success) {
      messageDiv.style.background = 'linear-gradient(135deg,#4ade80,#22c55e)';
      messageDiv.style.color = '#fff';
      messageDiv.innerHTML = '✅ ' + data.data;
      form.reset();
    } else {
      messageDiv.style.background = 'linear-gradient(135deg,#ef4444,#dc2626)';
      messageDiv.style.color = '#fff';
      messageDiv.innerHTML = '❌ ' + data.data;
    }
    submitBtn.disabled = false;
    submitBtn.innerHTML = '📤 Send Message';
    setTimeout(function() { messageDiv.style.display = 'none'; }, 5000);
  })
  .catch(function(error) {
    messageDiv.style.display = 'block';
    messageDiv.style.background = 'linear-gradient(135deg,#ef4444,#dc2626)';
    messageDiv.style.color = '#fff';
    messageDiv.innerHTML = '❌ Error sending message. Please try again.';
    submitBtn.disabled = false;
    submitBtn.innerHTML = '📤 Send Message';
  });
});

document.getElementById('newsletterForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const form = this;
  const emailInput = this.querySelector('input[name="newsletter_email"]');
  const email = emailInput.value;
  const submitBtn = this.querySelector('button[type="submit"]');

  submitBtn.disabled = true;
  submitBtn.textContent = '⏳ Subscribing...';

  const formData = new FormData();
  formData.append('action', 'newsletter_subscribe');
  formData.append('newsletter_email', email);

  fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
    method: 'POST',
    body: formData
  })
  .then(function(response) { return response.json(); })
  .then(function(data) {
    if (data.success) {
      alert('✅ ' + data.data);
      form.reset();
    } else {
      alert('❌ ' + data.data);
    }
    submitBtn.disabled = false;
    submitBtn.textContent = 'Subscribe';
  })
  .catch(function(error) {
    alert('❌ Error subscribing. Please try again.');
    submitBtn.disabled = false;
    submitBtn.textContent = 'Subscribe';
  });
});
</script>

<?php get_footer(); ?>
