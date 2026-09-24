<?php
/**
 * Template Name: Coloring Book
 *
 * Interactive "Quran Coloring Book for Kids" — kids can color the story
 * scenes online (bucket-fill or brush, on desktop or mobile) and save the
 * result to their device, or print a blank page for hand-coloring, plus a
 * matching verse tracing / writing-practice worksheet for each story.
 *
 * Self-contained: markup, CSS and JS all live in this one file, matching
 * the pattern used by the other page-*.php templates in this theme.
 */
if (!defined('ABSPATH')) exit;
get_header();

$up = get_stylesheet_directory_uri(); // not used for images (images live in uploads), kept for parity
$base = content_url('uploads/coloring-book');

$stories = array(
    array(
        'slug'    => 'bismillah',
        'icon'    => '📖',
        'title'   => "In the Name of God",
        'verse'   => 'Bismillah',
        'blurb'   => 'Every good work begins in the name of God, the Most Gracious, the Most Merciful.',
        'practice'=> false,
    ),
    array(
        'slug'    => 'building-kabah',
        'icon'    => '🕋',
        'title'   => "Building the Ka'bah",
        'verse'   => 'Quran 2:127',
        'blurb'   => 'Abraham and Ishmael raised the foundations of the shrine, praying: "Our Lord, accept this from us."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'hundred-years-sleep',
        'icon'    => '😴',
        'title'   => '100 Years of Sleep',
        'verse'   => 'Quran 2:259',
        'blurb'   => 'A traveler passed a ruined town and wondered how God could revive it — so God let him sleep for a hundred years.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'wisdom-in-stars',
        'icon'    => '⭐',
        'title'   => 'Wisdom in Stars',
        'verse'   => 'Quran 6:76',
        'blurb'   => 'When the night fell, he saw a shining planet. "Maybe this is my Lord," he said. When it disappeared, he said, "I do not like (gods) that disappear."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'noahs-ark',
        'icon'    => '🚢',
        'title'   => "Noah's Ark",
        'verse'   => 'Quran 11:40',
        'blurb'   => 'God commanded Noah to carry a pair of every kind aboard the ark, together with his family.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'josephs-dream',
        'icon'    => '✨',
        'title'   => "Joseph's Dream",
        'verse'   => 'Quran 12:4',
        'blurb'   => 'Joseph told his father: "I saw eleven planets, and the sun, and the moon; I saw them prostrating before me."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'god-is-restorer',
        'icon'    => '👁️',
        'title'   => 'GOD is Restorer',
        'verse'   => 'Quran 12:96',
        'blurb'   => 'When the bearer of good news arrived, he threw (the shirt) on his face, whereupon his vision was restored. He said, "Did I not tell you that I knew from GOD what you did not know?"',
        'practice'=> true,
    ),
    array(
        'slug'    => 'god-is-most-wise',
        'icon'    => '⛵',
        'title'   => 'GOD is Most Wise',
        'verse'   => 'Quran 18:71',
        'blurb'   => 'So they went. When they boarded a ship, he bore a hole in it. He said, "Did you bore a hole in it to drown its people? You have committed something terrible."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'hidden-treasure',
        'icon'    => '💰',
        'title'   => 'The Hidden Treasure',
        'verse'   => 'Quran 18:77',
        'blurb'   => 'When they reached a certain community, they asked the people for food, but they refused to host them. Soon, they found a wall about to collapse, and he fixed it...',
        'practice'=> true,
    ),
    array(
        'slug'    => 'prophetic-dam',
        'icon'    => '🛡️',
        'title'   => 'The Prophetic Dam',
        'verse'   => 'Quran 18:96',
        'blurb'   => '"Bring to me masses of iron." Once he filled the gap between the two mountains, he said, "Blow." Once it was red hot, he said, "Help me pour tar on top of it."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'talking-infant',
        'icon'    => '👶',
        'title'   => 'The Talking Infant',
        'verse'   => 'Quran 19:30',
        'blurb'   => 'The infant spoke and said, "I am a servant of GOD. He has given me the scripture, and has appointed me a prophet."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'gods-promise',
        'icon'    => '🧺',
        'title'   => "GOD's Promise",
        'verse'   => 'Quran 20:39',
        'blurb'   => 'Saying: "Throw him into the box, then throw him into the river. The river will throw him onto the shore, to be picked up by an enemy of Mine and an enemy of his..."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'the-calf',
        'icon'    => '🐄',
        'title'   => 'The Calf',
        'verse'   => 'Quran 20:88',
        'blurb'   => 'He produced for them a sculpted calf, complete with a calf\'s sound. They said, "This is your god, and the god of Moses." Thus, he forgot.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'silent-idols',
        'icon'    => '🔨',
        'title'   => 'The Silent Idols',
        'verse'   => 'Quran 21:58,59',
        'blurb'   => 'He broke them into pieces, except for a big one, that they may refer to it. They said, "Whoever did this to our gods is really a transgressor."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'cool-and-safe-fire',
        'icon'    => '🔥',
        'title'   => 'The Cool and Safe Fire',
        'verse'   => 'Quran 21:68,69',
        'blurb'   => 'They said, "Burn him and support your gods, if this is what you decide to do." We said, "O fire, be cool and safe for Abraham."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'god-is-hearer',
        'icon'    => '🐋',
        'title'   => 'GOD is Hearer',
        'verse'   => 'Quran 21:87',
        'blurb'   => '...He ended up imploring from the darkness (of the big fish\'s belly): "There is no god other than You. Be You glorified. I have committed a gross sin."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'profound-sign',
        'icon'    => '🐍',
        'title'   => 'A Profound Sign',
        'verse'   => 'Quran 26:45,46',
        'blurb'   => 'Moses threw his staff, whereupon it swallowed what they fabricated. The magicians fell prostrate.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'god-makes-a-way',
        'icon'    => '🌊',
        'title'   => 'GOD Makes a Way',
        'verse'   => 'Quran 26:62,63',
        'blurb'   => 'He said, "No way. My Lord is with me; He will guide me." We then inspired Moses: "Strike the sea with your staff." Whereupon it parted; each part was like a great hill.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'miraculous-camel',
        'icon'    => '🐫',
        'title'   => 'The Miraculous Camel',
        'verse'   => 'Quran 26:155',
        'blurb'   => 'He said, "Here is a camel that will drink only on a day that is assigned to her; a day that is different from your specified days of drinking."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'solomon-and-ants',
        'icon'    => '🐜',
        'title'   => 'Solomon and The Ants',
        'verse'   => 'Quran 27:18',
        'blurb'   => 'When they approached the valley of the ants, one ant said, "O you ants, go into your homes, lest you get crushed by Solomon and his soldiers, without perceiving."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'burning-bush',
        'icon'    => '🌳',
        'title'   => 'The Burning Bush',
        'verse'   => 'Quran 28:30',
        'blurb'   => 'When he reached it, he was called from the edge of the right side of the valley, in the blessed spot where the burning bush was located: "O Moses, this is Me, GOD, Lord of the universe."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'weight-of-riches',
        'icon'    => '🗝️',
        'title'   => 'The Weight of Riches',
        'verse'   => 'Quran 28:76',
        'blurb'   => '...so many treasures that the keys thereof were almost too heavy for the strongest hand. His people said to him, "Do not be so arrogant; GOD does not love those who are arrogant."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'ninety-nine-vs-one',
        'icon'    => '🐑',
        'title'   => '99 vs 1',
        'verse'   => 'Quran 38:23',
        'blurb'   => '"This brother of mine owns ninety nine ewes, while I own one ewe. He wants to marry my ewe with his, and continues to pressure me."',
        'practice'=> true,
    ),
    array(
        'slug'    => 'alhamdulillah',
        'icon'    => '🤲',
        'title'   => 'Alhamdulillah',
        'verse'   => 'Praise be to GOD',
        'blurb'   => 'All praise and thanks belong to God alone, Lord of the universe — for His countless blessings and endless grace.',
        'practice'=> false,
    ),
);

// Build a JS-ready array (adds full asset URLs) without touching $stories' PHP shape.
$js_stories = array();
foreach ($stories as $s) {
    $js_stories[] = array(
        'slug'     => $s['slug'],
        'title'    => $s['title'],
        'verse'    => $s['verse'],
        'blurb'    => $s['blurb'],
        'lineart'  => $base . '/' . $s['slug'] . '-lineart.png',
        'print'    => $base . '/' . $s['slug'] . '-print.jpg',
        'practice' => $s['practice'] ? ($base . '/' . $s['slug'] . '-practice.jpg') : null,
    );
}
?>
<div class="page-hero">
  <div class="wrap">
    <div class="crumb reveal"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / Quran Coloring Book</div>
    <h1 class="reveal">🎨 Quran Coloring Book for Kids</h1>
    <p class="reveal" style="max-width:640px">Colour the Prophets' stories from the Quran online, or print a blank page and colour by hand — then practise writing the verse that inspired it.</p>
    <p class="reveal"><a class="btn btn-gold btn-sm" href="<?php echo esc_url($base . '/quran-coloring-book-full.pdf'); ?>" target="_blank" rel="noopener">📥 Download Full Book (PDF)</a></p>
  </div>
</div>

<div class="blk cb-intro">
  <div class="wrap">
    <div class="cb-intro-card reveal">
      <p>بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ — In the name of God, Most Gracious, Most Merciful.</p>
      <p>Pick a story below. You can colour it right here on the screen with your finger or mouse — then save your picture to keep. Or print the blank page and colour it by hand with crayons or pencils. Each story also has a "write the verse" practice page you can print.</p>
    </div>
  </div>
</div>

<div class="blk cb-picker">
  <div class="wrap">
    <div class="sec-head">
      <span class="kicker reveal">🖍️ Choose a Story</span>
      <h2 class="reveal">24 Quran Stories to Colour</h2>
    </div>
    <div class="cb-grid">
      <?php foreach ($stories as $i => $s) : ?>
      <button type="button" class="cb-card reveal" data-story="<?php echo esc_attr($s['slug']); ?>">
        <span class="cb-card-thumb" style="background-image:url('<?php echo esc_url($base . '/' . $s['slug'] . '-thumb.jpg'); ?>')"></span>
        <span class="cb-card-body">
          <span class="cb-card-icon"><?php echo esc_html($s['icon']); ?></span>
          <span class="cb-card-title"><?php echo esc_html($s['title']); ?></span>
          <span class="cb-card-verse"><?php echo esc_html($s['verse']); ?></span>
        </span>
      </button>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="blk cb-workspace" id="cbWorkspace">
  <div class="wrap">
    <div class="cb-panel reveal">
      <div class="cb-fs-topbar">
        <span class="cb-fs-story-title" id="cbFsTitle"></span>
        <button type="button" id="cbFsClose" class="cb-fs-close" title="Close fullscreen (Esc)">✕</button>
      </div>
      <div class="cb-panel-head">
        <div>
          <div class="cb-story-verse" id="cbStoryVerse">Quran 2:127</div>
          <h2 id="cbStoryTitle">Building the Ka'bah</h2>
          <p id="cbStoryBlurb" class="cb-blurb">Abraham and Ishmael raised the foundations of the shrine, praying: "Our Lord, accept this from us."</p>
        </div>
        <div class="cb-panel-actions">
          <a href="#" id="cbPrintBlank" target="_blank" rel="noopener" class="btn btn-ghost">🖨️ Print / Save Blank Page</a>
          <a href="#" id="cbPrintPractice" target="_blank" rel="noopener" class="btn btn-ghost">✍️ Print Writing Practice</a>
        </div>
      </div>

      <div class="cb-toolbar">
        <div class="cb-swatches" id="cbSwatches"></div>
        <div class="cb-tools">
          <label class="cb-custom-color">
            <input type="color" id="cbCustomColor" value="#e63946">
            <span>Custom</span>
          </label>
          <div class="cb-tool-toggle">
            <button type="button" class="cb-tool-btn active" data-tool="fill" id="cbToolFill" title="Bucket fill">🪣 Fill</button>
            <button type="button" class="cb-tool-btn" data-tool="brush" id="cbToolBrush" title="Brush">🖌️ Brush</button>
          </div>
          <input type="range" id="cbBrushSize" min="4" max="60" value="18" class="cb-brush-size" title="Brush size" hidden>
          <button type="button" id="cbFsOpen" class="btn btn-ghost btn-sm">⛶ <span class="cb-btn-label">Fullscreen</span></button>
          <button type="button" id="cbResetZoom" class="btn btn-ghost btn-sm" title="Reset zoom/pan">🔍 <span class="cb-btn-label">Reset Zoom</span></button>
          <button type="button" id="cbUndo" class="btn btn-ghost btn-sm">↩️ <span class="cb-btn-label">Undo</span></button>
          <button type="button" id="cbClear" class="btn btn-ghost btn-sm">🗑️ <span class="cb-btn-label">Clear</span></button>
          <button type="button" id="cbSave" class="btn btn-gold btn-sm">💾 <span class="cb-btn-label">Save My Picture</span></button>
        </div>
      </div>

      <div class="cb-canvas-wrap" id="cbCanvasWrap">
        <div class="cb-canvas-inner" id="cbCanvasInner">
          <canvas id="cbPaintCanvas"></canvas>
          <img id="cbLineImg" alt="" draggable="false">
          <div class="cb-loading" id="cbLoading">Loading…</div>
        </div>
      </div>
      <p class="cb-hint">Tip: tap a colour, then tap inside an area to fill it. Switch to 🖌️ Brush for fine detail.</p>
    </div>
  </div>
</div>

<div class="verse reveal">
  <div class="wrap">
    <p>"We narrate to you the most accurate history through the revelation of this Quran." <span>— Quran 12:3</span></p>
  </div>
</div>

<style>
.cb-intro-card{max-width:820px;margin:0 auto;background:var(--panel-2);border:1px solid var(--line);border-radius:var(--radius-lg);padding:22px 26px;text-align:center}
.cb-intro-card p{margin:0 0 8px;color:var(--ink-soft)}
.cb-intro-card p:last-child{margin-bottom:0}

.cb-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:18px;margin-top:22px}
.cb-card{display:flex;flex-direction:column;text-align:left;background:var(--panel);border:1px solid var(--line);border-radius:var(--radius-lg);overflow:hidden;cursor:pointer;padding:0;font:inherit;color:inherit;transition:transform .15s ease,border-color .15s ease,box-shadow .15s ease}
.cb-card:hover,.cb-card:focus-visible{transform:translateY(-4px);border-color:var(--gold);box-shadow:0 10px 26px rgba(0,0,0,.25)}
.cb-card.active{border-color:var(--gold-bright);box-shadow:0 0 0 2px var(--gold-bright) inset}
.cb-card-thumb{display:block;width:100%;aspect-ratio:4/3;background-color:#fff;background-size:cover;background-position:top center}
.cb-card-body{display:flex;flex-direction:column;gap:4px;padding:14px 16px 18px}
.cb-card-icon{font-size:22px}
.cb-card-title{font-weight:700;color:var(--ink)}
.cb-card-verse{font-size:13px;color:var(--gold)}

.cb-panel{background:var(--panel-2);border:1px solid var(--line);border-radius:var(--radius-lg);padding:24px;max-width:980px;margin:0 auto}
.cb-panel-head{display:flex;flex-wrap:wrap;gap:16px;justify-content:space-between;align-items:flex-start;margin-bottom:18px}
.cb-panel-head h2{margin:2px 0 6px}
.cb-story-verse{color:var(--gold);font-size:13px;font-weight:700;letter-spacing:.04em;text-transform:uppercase}
.cb-blurb{color:var(--muted);max-width:520px;margin:0}
.cb-panel-actions{display:flex;flex-wrap:wrap;gap:10px}

.cb-toolbar{display:flex;flex-wrap:wrap;gap:14px;align-items:center;justify-content:space-between;background:var(--panel);border:1px solid var(--line);border-radius:var(--radius);padding:12px 14px;margin-bottom:18px}
.cb-swatches{display:flex;flex-wrap:wrap;gap:7px;max-width:420px}
.cb-swatch{width:26px;height:26px;border-radius:50%;border:2px solid rgba(255,255,255,.25);cursor:pointer;padding:0}
.cb-swatch.active{border-color:var(--gold-bright);box-shadow:0 0 0 2px var(--gold-bright)}
.cb-tools{display:flex;flex-wrap:wrap;gap:10px;align-items:center}
.cb-custom-color{display:flex;align-items:center;gap:6px;font-size:13px;color:var(--muted)}
.cb-custom-color input[type=color]{width:30px;height:30px;border:none;background:none;cursor:pointer;padding:0}
.cb-tool-toggle{display:flex;border:1px solid var(--line);border-radius:999px;overflow:hidden}
.cb-tool-btn{border:none;background:transparent;color:var(--ink-soft);padding:7px 14px;cursor:pointer;font-size:13px}
.cb-tool-btn.active{background:var(--gold-grad);color:#241a06;font-weight:700}
.cb-brush-size{width:110px}
.btn-sm{padding:8px 14px;font-size:13px}

.cb-canvas-wrap{display:flex;overflow:hidden;justify-content:center;background:repeating-conic-gradient(#f4ede0 0% 25%,#e9dfcd 0% 50%) 0 0/24px 24px;border-radius:var(--radius);padding:18px;border:1px solid var(--line)}
.cb-canvas-inner{position:relative;width:100%;max-width:520px;line-height:0}
.cb-canvas-inner canvas{width:100%;height:auto;display:block;background:#fff;border-radius:6px;touch-action:none}
.cb-canvas-inner img{position:absolute;inset:0;width:100%;height:100%;pointer-events:none;user-select:none}
.cb-loading{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;background:rgba(255,255,255,.7);color:#333;font-weight:600;border-radius:6px}
.cb-loading[hidden]{display:none}
.cb-hint{text-align:center;color:var(--muted);font-size:13px;margin:14px 0 0}

@media (max-width:640px){
  .cb-panel{padding:16px}
  .cb-panel-actions{width:100%}
  .cb-panel-actions .btn{flex:1;text-align:center}
}

/* ---- Fullscreen coloring mode (desktop + mobile, no page scrolling) ---- */
.cb-fs-topbar{display:none;align-items:center;justify-content:space-between;gap:12px;margin-bottom:10px}
.cb-fs-story-title{font-weight:700;color:var(--ink);font-size:15px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.cb-fs-close{display:none;align-items:center;justify-content:center;flex:0 0 auto;width:38px;height:38px;border-radius:50%;border:1px solid var(--line);background:var(--panel);color:var(--ink);font-size:17px;line-height:1;cursor:pointer;box-shadow:0 4px 14px rgba(0,0,0,.25)}
.cb-fs-close:hover{border-color:var(--gold);color:var(--gold)}

body.cb-fullscreen{overflow:hidden}
body.cb-fullscreen #cbWorkspace{position:fixed;inset:0;z-index:99990;background:var(--bg);display:flex;padding:0;margin:0}
body.cb-fullscreen #cbWorkspace .wrap{width:100%;max-width:none;padding:0;margin:0;display:flex}
body.cb-fullscreen .cb-panel{width:100%;max-width:none;margin:0;border-radius:0;border:none;display:flex;flex-direction:column;height:100%;padding:calc(10px + env(safe-area-inset-top)) 14px calc(10px + env(safe-area-inset-bottom))}
body.cb-fullscreen .cb-fs-topbar{display:flex}
body.cb-fullscreen .cb-fs-close{display:flex}
body.cb-fullscreen .cb-panel-head,
body.cb-fullscreen .cb-hint,
body.cb-fullscreen #cbFsOpen{display:none}
body.cb-fullscreen .cb-toolbar{margin-bottom:10px;flex:0 0 auto}
body.cb-fullscreen .cb-canvas-wrap{flex:1;min-height:0;display:flex;align-items:center;justify-content:center;padding:6px;border-radius:var(--radius)}
body.cb-fullscreen .cb-canvas-inner{margin:0 auto;max-width:100%;max-height:100%}
body.cb-fullscreen .cb-canvas-inner canvas,
body.cb-fullscreen .cb-canvas-inner img{width:100%;height:100%}

/* Compact toolbar in fullscreen on small/mobile screens — trades label text
   and wrapped rows for a couple of horizontally-scrollable strips, freeing
   more height for the canvas itself. */
@media (max-width:640px){
  body.cb-fullscreen .cb-panel{padding-left:8px;padding-right:8px}
  body.cb-fullscreen .cb-fs-topbar{margin-bottom:6px}
  body.cb-fullscreen .cb-fs-story-title{font-size:13px}
  body.cb-fullscreen .cb-fs-close{width:32px;height:32px;font-size:15px}
  body.cb-fullscreen .cb-toolbar{flex-direction:column;flex-wrap:nowrap;align-items:stretch;gap:6px;padding:6px 8px;margin-bottom:6px}
  body.cb-fullscreen .cb-swatches{flex-wrap:nowrap;overflow-x:auto;-webkit-overflow-scrolling:touch;max-width:none;gap:6px;padding-bottom:2px}
  body.cb-fullscreen .cb-swatch{width:22px;height:22px;flex:0 0 auto}
  body.cb-fullscreen .cb-tools{flex-wrap:nowrap;overflow-x:auto;-webkit-overflow-scrolling:touch;gap:6px;justify-content:flex-start}
  body.cb-fullscreen .cb-custom-color{flex:0 0 auto;gap:0}
  body.cb-fullscreen .cb-custom-color span,
  body.cb-fullscreen .cb-btn-label{display:none}
  body.cb-fullscreen .cb-custom-color input[type=color]{width:26px;height:26px}
  body.cb-fullscreen .cb-tool-btn{padding:6px 10px;font-size:12px;white-space:nowrap;flex:0 0 auto}
  body.cb-fullscreen .cb-brush-size{width:70px;flex:0 0 auto}
  body.cb-fullscreen .btn-sm{padding:6px 9px;font-size:14px;white-space:nowrap;flex:0 0 auto}
}
</style>

<script>
window.GA_COLORING_STORIES = <?php echo wp_json_encode($js_stories); ?>;
</script>
<script>
(function () {
  "use strict";
  var STORIES = window.GA_COLORING_STORIES || [];
  var PALETTE = [
    "#ffffff","#000000","#6b4226","#e63946","#f3722c","#f9c74f",
    "#90be6d","#43aa8b","#277da1","#4361ee","#7209b7","#f72585",
    "#ffb3c1","#a9def9","#d4a373","#ffd60a"
  ];

  var current = null;         // current story object
  var tool = "fill";
  var color = "#e63946";
  var brushSize = 18;
  var wallMask = null;        // Uint8Array, 1 = line/wall
  var maskW = 0, maskH = 0;
  var paintCanvas = document.getElementById("cbPaintCanvas");
  var ctx = paintCanvas ? paintCanvas.getContext("2d", { willReadFrequently: true }) : null;
  var lineImg = document.getElementById("cbLineImg");
  var loadingEl = document.getElementById("cbLoading");
  var history = [];
  var drawing = false;
  var canvasZoom = 1, canvasPanX = 0, canvasPanY = 0;
  var activePointers = new Map();
  var pinchBase = null;
  var suppressPaintUntilLift = false;
  var ZOOM_MIN = 1, ZOOM_MAX = 4;

  function $(id) { return document.getElementById(id); }

  function buildSwatches() {
    var wrap = $("cbSwatches");
    if (!wrap) return;
    PALETTE.forEach(function (c, i) {
      var b = document.createElement("button");
      b.type = "button";
      b.className = "cb-swatch" + (i === 3 ? " active" : "");
      b.style.background = c;
      b.setAttribute("data-color", c);
      b.addEventListener("click", function () {
        setColor(c);
        wrap.querySelectorAll(".cb-swatch").forEach(function (s) { s.classList.remove("active"); });
        b.classList.add("active");
      });
      wrap.appendChild(b);
    });
  }

  function setColor(c) { color = c; }

  function setTool(t) {
    tool = t;
    $("cbToolFill").classList.toggle("active", t === "fill");
    $("cbToolBrush").classList.toggle("active", t === "brush");
    $("cbBrushSize").hidden = t !== "brush";
  }

  function loadStory(story) {
    current = story;
    resetCanvasView();
    $("cbStoryVerse").textContent = story.verse;
    $("cbStoryTitle").textContent = story.title;
    $("cbStoryBlurb").textContent = story.blurb;
    var fsTitleEl = $("cbFsTitle");
    if (fsTitleEl) fsTitleEl.textContent = story.title;
    $("cbPrintBlank").href = story.print;
    var practiceBtn = $("cbPrintPractice");
    if (story.practice) {
      practiceBtn.href = story.practice;
      practiceBtn.style.display = "";
    } else {
      practiceBtn.style.display = "none";
    }
    loadingEl.hidden = false;
    history = [];

    var probe = new Image();
    probe.crossOrigin = "anonymous";
    probe.onload = function () {
      maskW = probe.naturalWidth;
      maskH = probe.naturalHeight;
      paintCanvas.width = maskW;
      paintCanvas.height = maskH;
      ctx.clearRect(0, 0, maskW, maskH);

      var maskCanvas = document.createElement("canvas");
      maskCanvas.width = maskW;
      maskCanvas.height = maskH;
      var mctx = maskCanvas.getContext("2d");
      mctx.drawImage(probe, 0, 0);
      var data;
      try {
        data = mctx.getImageData(0, 0, maskW, maskH).data;
      } catch (e) {
        data = null;
      }
      wallMask = new Uint8Array(maskW * maskH);
      if (data) {
        for (var p = 0, px = 0; p < data.length; p += 4, px++) {
          wallMask[px] = data[p + 3] > 40 ? 1 : 0; // alpha threshold = line
        }
      }
      lineImg.src = story.lineart;
      loadingEl.hidden = true;
      pushHistory();
      fitCanvasToContainer();
    };
    probe.onerror = function () { loadingEl.textContent = "Could not load image."; };
    probe.src = story.lineart;
  }

  // Keeps the canvas sized to fit fully inside the fullscreen viewport
  // (both width and height), so kids can colour without any scrolling.
  function fitCanvasToContainer() {
    if (!document.body.classList.contains("cb-fullscreen")) return;
    var wrapEl = $("cbCanvasWrap");
    var innerEl = $("cbCanvasInner");
    if (!wrapEl || !innerEl || !maskW || !maskH) return;
    var availW = wrapEl.clientWidth;
    var availH = wrapEl.clientHeight;
    if (availW <= 0 || availH <= 0) return;
    var scale = Math.min(availW / maskW, availH / maskH);
    innerEl.style.width = Math.floor(maskW * scale) + "px";
    innerEl.style.height = Math.floor(maskH * scale) + "px";
  }

  function enterFullscreen() {
    document.body.classList.add("cb-fullscreen");
    requestAnimationFrame(fitCanvasToContainer);
  }

  function exitFullscreen() {
    document.body.classList.remove("cb-fullscreen");
    var innerEl = $("cbCanvasInner");
    if (innerEl) { innerEl.style.width = ""; innerEl.style.height = ""; }
  }

  function pushHistory() {
    if (!ctx) return;
    try {
      history.push(ctx.getImageData(0, 0, maskW, maskH));
      if (history.length > 15) history.shift();
    } catch (e) {}
  }

  function undo() {
    if (history.length < 2) return;
    history.pop();
    var prev = history[history.length - 1];
    ctx.putImageData(prev, 0, 0);
  }

  function clearCanvas() {
    ctx.clearRect(0, 0, maskW, maskH);
    pushHistory();
  }

  function hexToRgba(hex) {
    var h = hex.replace("#", "");
    if (h.length === 3) h = h.split("").map(function (c) { return c + c; }).join("");
    var num = parseInt(h, 16);
    return [ (num >> 16) & 255, (num >> 8) & 255, num & 255, 255 ];
  }

  function floodFill(startX, startY, fillColor) {
    if (!wallMask || startX < 0 || startY < 0 || startX >= maskW || startY >= maskH) return;
    if (wallMask[startY * maskW + startX]) return; // clicked on a line
    var imgData = ctx.getImageData(0, 0, maskW, maskH);
    var d = imgData.data;
    var startIdx = (startY * maskW + startX) * 4;
    var targetR = d[startIdx], targetG = d[startIdx + 1], targetB = d[startIdx + 2], targetA = d[startIdx + 3];
    var fr = fillColor[0], fg = fillColor[1], fb = fillColor[2], fa = fillColor[3];
    if (targetR === fr && targetG === fg && targetB === fb && targetA === fa) return;

    function matches(idx) {
      return d[idx] === targetR && d[idx + 1] === targetG && d[idx + 2] === targetB && d[idx + 3] === targetA;
    }

    var stack = [[startX, startY]];
    var visited = new Uint8Array(maskW * maskH);
    while (stack.length) {
      var pt = stack.pop();
      var x = pt[0], y = pt[1];
      var px = y * maskW + x;
      if (x < 0 || x >= maskW || y < 0 || y >= maskH) continue;
      if (visited[px] || wallMask[px]) continue;
      var idx = px * 4;
      if (!matches(idx)) continue;
      // fill this whole horizontal span
      var xl = x;
      while (xl >= 0 && !wallMask[y * maskW + xl] && matches((y * maskW + xl) * 4)) xl--;
      xl++;
      var xr = x;
      while (xr < maskW && !wallMask[y * maskW + xr] && matches((y * maskW + xr) * 4)) xr++;
      xr--;
      for (var xx = xl; xx <= xr; xx++) {
        var spx = y * maskW + xx;
        if (visited[spx]) continue;
        visited[spx] = 1;
        var sidx = spx * 4;
        d[sidx] = fr; d[sidx + 1] = fg; d[sidx + 2] = fb; d[sidx + 3] = fa;
        if (y > 0) { var up = spx - maskW; if (!visited[up] && !wallMask[up] && matches(up * 4)) stack.push([xx, y - 1]); }
        if (y < maskH - 1) { var dn = spx + maskW; if (!visited[dn] && !wallMask[dn] && matches(dn * 4)) stack.push([xx, y + 1]); }
      }
    }
    ctx.putImageData(imgData, 0, 0);
  }

  function pointerDist(p1, p2) {
    var dx = p1.x - p2.x, dy = p1.y - p2.y;
    return Math.sqrt(dx * dx + dy * dy);
  }
  function pointerMid(p1, p2) {
    return { x: (p1.x + p2.x) / 2, y: (p1.y + p2.y) / 2 };
  }
  function applyCanvasTransform() {
    var innerEl = $("cbCanvasInner");
    if (innerEl) innerEl.style.transform = "translate(" + canvasPanX + "px," + canvasPanY + "px) scale(" + canvasZoom + ")";
  }
  function clampPan() {
    var wrapEl = $("cbCanvasWrap"), innerEl = $("cbCanvasInner");
    if (!wrapEl || !innerEl) return;
    var w = innerEl.offsetWidth * canvasZoom, h = innerEl.offsetHeight * canvasZoom;
    var maxX = Math.max(0, (w - wrapEl.clientWidth) / 2 + 60);
    var maxY = Math.max(0, (h - wrapEl.clientHeight) / 2 + 60);
    canvasPanX = Math.max(-maxX, Math.min(maxX, canvasPanX));
    canvasPanY = Math.max(-maxY, Math.min(maxY, canvasPanY));
  }
  function resetCanvasView() {
    var innerEl = $("cbCanvasInner");
    canvasZoom = 1; canvasPanX = 0; canvasPanY = 0;
    if (innerEl) {
      innerEl.style.transition = "transform .25s ease";
      applyCanvasTransform();
      setTimeout(function () { innerEl.style.transition = ""; }, 260);
    }
  }

  function canvasPoint(evt) {
    var rect = paintCanvas.getBoundingClientRect();
    var cx = (evt.clientX !== undefined) ? evt.clientX : (evt.touches && evt.touches[0].clientX);
    var cy = (evt.clientY !== undefined) ? evt.clientY : (evt.touches && evt.touches[0].clientY);
    var x = Math.round((cx - rect.left) * (maskW / rect.width));
    var y = Math.round((cy - rect.top) * (maskH / rect.height));
    return [x, y];
  }

  function brushDab(x, y) {
    var rgba = hexToRgba(color);
    ctx.fillStyle = "rgba(" + rgba[0] + "," + rgba[1] + "," + rgba[2] + ",1)";
    ctx.beginPath();
    ctx.arc(x, y, brushSize / 2, 0, Math.PI * 2);
    ctx.fill();
  }

  function onPointerDown(evt) {
    if (!current) return;
    activePointers.set(evt.pointerId, { x: evt.clientX, y: evt.clientY });
    if (activePointers.size >= 2) {
      evt.preventDefault();
      drawing = false;
      suppressPaintUntilLift = true;
      var pts2 = Array.from(activePointers.values()).slice(0, 2);
      pinchBase = {
        dist: pointerDist(pts2[0], pts2[1]) || 1,
        mid: pointerMid(pts2[0], pts2[1]),
        scale: canvasZoom,
        panX: canvasPanX,
        panY: canvasPanY
      };
      return;
    }
    if (suppressPaintUntilLift) return;
    evt.preventDefault();
    var pt = canvasPoint(evt);
    if (tool === "fill") {
      floodFill(pt[0], pt[1], hexToRgba(color));
      pushHistory();
    } else {
      drawing = true;
      brushDab(pt[0], pt[1]);
    }
  }
  function onPointerMove(evt) {
    if (activePointers.has(evt.pointerId)) {
      activePointers.set(evt.pointerId, { x: evt.clientX, y: evt.clientY });
    }
    if (activePointers.size >= 2 && pinchBase) {
      evt.preventDefault();
      var pts2 = Array.from(activePointers.values()).slice(0, 2);
      var dist = pointerDist(pts2[0], pts2[1]) || 1;
      var mid = pointerMid(pts2[0], pts2[1]);
      canvasZoom = Math.max(ZOOM_MIN, Math.min(ZOOM_MAX, pinchBase.scale * (dist / pinchBase.dist)));
      canvasPanX = pinchBase.panX + (mid.x - pinchBase.mid.x);
      canvasPanY = pinchBase.panY + (mid.y - pinchBase.mid.y);
      clampPan();
      applyCanvasTransform();
      return;
    }
    if (!drawing || tool !== "brush") return;
    evt.preventDefault();
    var pt = canvasPoint(evt);
    brushDab(pt[0], pt[1]);
  }
  function onPointerUp(evt) {
    if (evt && activePointers.has(evt.pointerId)) activePointers.delete(evt.pointerId);
    if (activePointers.size < 2) pinchBase = null;
    if (activePointers.size === 0) {
      suppressPaintUntilLift = false;
      if (drawing) { drawing = false; pushHistory(); }
    }
  }

  // Downloads a canvas as a PNG file. Uses a Blob + object URL rather than a
  // raw base64 data: URL — some browsers (notably Microsoft Edge, whose
  // Defender SmartScreen treats large data: URL "downloads" as suspicious
  // and can silently block or warn on them) don't reliably save a data: URL
  // via a synthetic <a download> click, but handle a blob: object URL the
  // same way Chrome does. Falls back to the old data-URL technique, and then
  // to opening the image in a new tab, for any browser missing toBlob.
  function downloadCanvas(canvasEl, filename) {
    function viaDataUrl() {
      try {
        var durl = canvasEl.toDataURL("image/png");
        var a = document.createElement("a");
        a.href = durl;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
      } catch (e) {
        try { window.open(canvasEl.toDataURL("image/png"), "_blank"); } catch (e2) {}
      }
    }
    function viaBlob(blob) {
      if (!blob) { viaDataUrl(); return; }
      if (navigator.msSaveOrOpenBlob) { // old (EdgeHTML) Edge / IE11
        navigator.msSaveOrOpenBlob(blob, filename);
        return;
      }
      var url = URL.createObjectURL(blob);
      var a = document.createElement("a");
      a.href = url;
      a.download = filename;
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      setTimeout(function () { URL.revokeObjectURL(url); }, 4000);
    }
    if (canvasEl.toBlob) {
      canvasEl.toBlob(viaBlob, "image/png");
    } else {
      viaDataUrl();
    }
  }

  function saveImage() {
    if (!current) return;
    var out = document.createElement("canvas");
    out.width = maskW; out.height = maskH;
    var octx = out.getContext("2d");
    octx.fillStyle = "#ffffff";
    octx.fillRect(0, 0, maskW, maskH);
    octx.drawImage(paintCanvas, 0, 0);
    var lineOnly = new Image();
    lineOnly.crossOrigin = "anonymous";
    var finish = function () { downloadCanvas(out, current.slug + "-my-coloring.png"); };
    lineOnly.onload = function () {
      try { octx.drawImage(lineOnly, 0, 0, maskW, maskH); } catch (e) {}
      finish();
    };
    lineOnly.onerror = finish; // still save the colouring even if the lineart redraw fails
    lineOnly.src = current.lineart;
  }

  function selectCard(slug, openFullscreen) {
    var story = STORIES.filter(function (s) { return s.slug === slug; })[0];
    if (!story) return;
    document.querySelectorAll(".cb-card").forEach(function (c) {
      c.classList.toggle("active", c.getAttribute("data-story") === slug);
    });
    loadStory(story);
    if (openFullscreen) enterFullscreen();
  }

  document.addEventListener("DOMContentLoaded", function () {
    if (!paintCanvas || !STORIES.length) return;
    buildSwatches();
    setColor("#e63946");

    document.querySelectorAll(".cb-card").forEach(function (card) {
      card.addEventListener("click", function () {
        selectCard(card.getAttribute("data-story"), true);
      });
    });

    $("cbToolFill").addEventListener("click", function () { setTool("fill"); });
    $("cbToolBrush").addEventListener("click", function () { setTool("brush"); });
    $("cbBrushSize").addEventListener("input", function (e) { brushSize = parseInt(e.target.value, 10); });
    $("cbCustomColor").addEventListener("input", function (e) {
      setColor(e.target.value);
      document.querySelectorAll(".cb-swatch").forEach(function (s) { s.classList.remove("active"); });
    });
    var resetZoomBtn = $("cbResetZoom");
    if (resetZoomBtn) resetZoomBtn.addEventListener("click", resetCanvasView);
    $("cbUndo").addEventListener("click", undo);
    $("cbClear").addEventListener("click", clearCanvas);
    $("cbSave").addEventListener("click", saveImage);

    var fsOpenBtn = $("cbFsOpen");
    if (fsOpenBtn) fsOpenBtn.addEventListener("click", enterFullscreen);
    var fsCloseBtn = $("cbFsClose");
    if (fsCloseBtn) fsCloseBtn.addEventListener("click", exitFullscreen);
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && document.body.classList.contains("cb-fullscreen")) exitFullscreen();
    });
    window.addEventListener("resize", fitCanvasToContainer);
    window.addEventListener("orientationchange", function () {
      setTimeout(fitCanvasToContainer, 200);
    });

    paintCanvas.addEventListener("pointerdown", onPointerDown);
    paintCanvas.addEventListener("pointermove", onPointerMove);
    window.addEventListener("pointerup", onPointerUp);
    window.addEventListener("pointercancel", onPointerUp);

    selectCard(STORIES[1] ? STORIES[1].slug : STORIES[0].slug, false);
  });
})();
</script>

<?php get_footer(); ?>
