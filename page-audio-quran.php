<?php
/**
 * Template Name: Audio Quran
 *
 * Auto-loads for the "Audio Quran" page (slug: audio-quran) via the
 * WordPress template hierarchy. Migrated from the old godalone-theme into
 * the GodAlone Premium design system. The sura data table and player logic
 * are preserved unchanged from the original; only the markup/CSS wrapper
 * is restyled to the new theme's design tokens.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<style>
.audio-page-wrap{max-width:900px;margin:0 auto;padding:0 22px}
.lang-tabs{display:flex;justify-content:center;gap:.8rem;margin-bottom:28px}
.lang-tab{padding:10px 25px;background:var(--panel-2);color:var(--gold-bright);
  border:2px solid var(--gold);border-radius:25px;cursor:pointer;font-weight:600;
  transition:.2s;font-size:.95rem;font-family:inherit}
.lang-tab.active{background:var(--gold-grad);color:#1a1206;box-shadow:0 4px 15px -4px rgba(216,180,94,.6)}
.lang-tab:hover{transform:translateY(-2px)}
.audio-player-box{background:linear-gradient(180deg,var(--panel),var(--panel-2));
  border:1px solid var(--line);border-radius:var(--radius-lg);padding:34px;box-shadow:var(--shadow)}
.sura-info-line{display:flex;align-items:center;justify-content:center;gap:.8rem;margin-bottom:.6rem}
.sura-number{font-size:2.4rem;font-weight:700;color:var(--gold);font-family:var(--font-display);min-width:56px;text-align:right}
.sura-arabic{font-family:var(--font-ar);font-size:1.9rem;color:var(--gold-bright);direction:rtl}
.sura-name{font-size:1.2rem;color:var(--ink);margin-bottom:.4rem;text-align:center}
.sura-meta{font-size:.9rem;color:var(--muted);text-align:center;margin-bottom:22px}
.audio-controls{display:flex;justify-content:center;align-items:center;gap:14px;margin-bottom:20px}
.control-btn{background:var(--gold-grad);border:none;border-radius:50%;width:48px;height:48px;
  display:flex;align-items:center;justify-content:center;cursor:pointer;transition:.2s;
  box-shadow:0 4px 15px -6px rgba(0,0,0,.4)}
.control-btn:hover{transform:scale(1.08)}
.control-btn svg{width:20px;height:20px;fill:#1a1206}
.play-btn{width:58px;height:58px}
.play-btn svg{width:26px;height:26px}
.progress-container{margin-bottom:14px}
.progress-bar{width:100%;height:6px;background:var(--line-2);border-radius:10px;cursor:pointer;overflow:hidden}
.progress-fill{height:100%;background:var(--gold-grad);border-radius:10px;width:0%}
.time-display{display:flex;justify-content:space-between;margin-top:6px;color:var(--muted);font-size:.85rem}
.sura-selector{margin-top:20px;text-align:center}
.sura-selector label{display:block;color:var(--gold-bright);margin-bottom:8px;font-weight:600;font-size:.95rem}
.sura-selector select{width:100%;max-width:500px;padding:10px;background:var(--panel-2);
  color:var(--ink);border:1px solid var(--line);border-radius:12px;font-size:.95rem}
.playlist-cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:16px;margin-top:16px}
.playlist-card{background:linear-gradient(135deg,#cc0000,#ff0000);padding:20px;border-radius:16px;
  text-align:center;text-decoration:none;color:#fff;transition:.2s}
.playlist-card:hover{transform:translateY(-5px);color:#fff}
.playlist-icon{font-size:2rem;margin-bottom:10px}
</style>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">GodAlone.in</div>
    <h1 class="reveal">🎧 Audio Quran</h1>
    <p class="bism reveal" style="margin-top:22px">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</p>
    <p class="bism-en">In the Name of God, Most Gracious, Most Merciful</p>
  </div>
</div>

<section class="blk">
  <div class="audio-page-wrap">

    <div class="lang-tabs">
      <button class="lang-tab active" onclick="switchLanguage('english')" id="englishTab">🇬🇧 English</button>
      <button class="lang-tab" onclick="switchLanguage('tamil')" id="tamilTab">🇮🇳 தமிழ் (Tamil)</button>
    </div>

    <div class="audio-player-box">
      <div class="sura-info-line">
        <div class="sura-number" id="suraNumber">1</div>
        <div class="sura-arabic" id="suraArabic">الفاتحة</div>
      </div>
      <div class="sura-name" id="suraName">The Key (Al-Fatihah) <span class="meccan-icon">🕋</span></div>
      <div class="sura-meta" id="suraMeta">7 Verses • Revelation Order: 5 • Meccan</div>

      <audio id="audioPlayer" preload="metadata"></audio>

      <div class="audio-controls">
        <button class="control-btn" onclick="previousSura()" title="Previous Sura">
          <svg viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
        </button>
        <button class="control-btn play-btn" onclick="togglePlay()" id="playPauseBtn" title="Play">
          <svg viewBox="0 0 24 24" id="playIcon"><path d="M8 5v14l11-7z"/></svg>
          <svg viewBox="0 0 24 24" id="pauseIcon" style="display:none"><path d="M6 4h4v16H6zm8 0h4v16h-4z"/></svg>
        </button>
        <button class="control-btn" onclick="nextSura()" title="Next Sura">
          <svg viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
        </button>
        <button class="control-btn" onclick="downloadAudio()" title="Download Current Sura">
          <svg viewBox="0 0 24 24"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
        </button>
      </div>

      <div class="progress-container">
        <div class="progress-bar" id="progressBar" onclick="seek(event)">
          <div class="progress-fill" id="progressFill"></div>
        </div>
        <div class="time-display">
          <span id="currentTime">0:00</span>
          <span id="duration">0:00</span>
        </div>
      </div>

      <div class="sura-selector">
        <label for="suraSelect">Select Sura:</label>
        <select id="suraSelect" onchange="changeSura()"></select>
      </div>
    </div>

  </div>
</section>

<section class="blk" style="padding-top:0">
  <div class="wrap">
    <div class="sec-head">
      <div class="kicker">YouTube</div>
      <h2>Quran playlists</h2>
    </div>
    <div class="playlist-cards" style="max-width:600px;margin:0 auto">
      <a href="https://youtube.com/playlist?list=PL1ZWur9ydxbTFg--5zWUILdBvc_UiLEN2" target="_blank" rel="noopener" class="playlist-card">
        <div class="playlist-icon">🇬🇧</div>
        <h3>English Quran</h3>
        <p>Complete recitation in English translation</p>
      </a>
      <a href="https://music.youtube.com/playlist?list=PL5aSCB9_3K7n2A0q5CqE1m6kavQuthQHV&si=hhIEEzVmmqpv5M1J" target="_blank" rel="noopener" class="playlist-card">
        <div class="playlist-icon">🇮🇳</div>
        <h3>Tamil Quran</h3>
        <p>திருக்குர்ஆன் தமிழ் மொழிபெயர்ப்பு ஆடியோ</p>
      </a>
    </div>
  </div>
</section>

<script>
const suraData = [
{ar: "الفاتحة", en: "The Key (Al-Fatihah)", ta: "திறவுகோல் (அல்-ஃபாத்திஹாஹ்)", verses: 7, revelationOrder: 5, type: "Meccan", taFile: "001 sura al fatehah"},
{ar: "البقرة", en: "The Heifer (Al-Baqarah)", ta: "பசுங்கன்று (அல்-பகராஹ்)", verses: 286, revelationOrder: 87, type: "Medinan", taFile: "002 sura al bakara"},
{ar: "آل عمران", en: "The Amramites (Ali 'Imran)", ta: "இம்ரானியர்கள் (ஆலி-இம்ரான்)", verses: 200, revelationOrder: 89, type: "Medinan", taFile: "003 sura aala imran"},
{ar: "النساء", en: "Women (Al-Nisa')", ta: "பெண்கள் (அல்-நிஸா)", verses: 176, revelationOrder: 92, type: "Medinan", taFile: "004 sura al nisa"},
{ar: "المائدة", en: "The Feast (Al-Ma'idah)", ta: "விருந்து (அல்-மா'யிதாஹ்)", verses: 120, revelationOrder: 112, type: "Medinan", taFile: "005 sura al mayidha"},
{ar: "الأنعام", en: "Livestock (Al-An`am)", ta: "கால்நடைகள் (அல்-அன்'ஆம்)", verses: 165, revelationOrder: 55, type: "Meccan", taFile: "006 sura al ana am"},
{ar: "الأعراف", en: "The Purgatory (Al-A`raf)", ta: "ஆத்ம சுத்திகரிப்பு ஸ்தலம் (அல்-அஃராஃப்)", verses: 206, revelationOrder: 39, type: "Meccan", taFile: "007 sura al ahraf"},
{ar: "الأنفال", en: "The Spoils of War (Al-Anfal)", ta: "போரின் வெற்றிப் பொருட்கள் (அல்-அன்ஃபால்)", verses: 75, revelationOrder: 88, type: "Medinan", taFile: "008 sura al anfal"},
{ar: "براءة", en: "Ultimatum (Bara'ah)", ta: "இறுதி நிபந்தனை (பரா'அஹ்)", verses: 127, revelationOrder: 113, type: "Medinan", taFile: "009 sura al bara a"},
{ar: "يونس", en: "Jonah (Yunus)", ta: "ஜோனா (யூனுஸ்)", verses: 109, revelationOrder: 51, type: "Meccan", taFile: "010 sura younus"},
{ar: "هود", en: "Hûd (Hud)", ta: "ஹூத் (ஹூத்)", verses: 123, revelationOrder: 52, type: "Meccan", taFile: "011 sura hoodh"},
{ar: "يوسف", en: "Joseph (Yusuf)", ta: "ஜோஸஃப் (யூஸுஃப்)", verses: 111, revelationOrder: 53, type: "Meccan", taFile: "012 sura yousuff"},
{ar: "الرعد", en: "Thunder (Al-Ra`ad)", ta: "இடியோசை (அல்-ரஃத்)", verses: 43, revelationOrder: 96, type: "Medinan", taFile: "013 sura al ra adh"},
{ar: "ابراهيم", en: "Abraham (Ibrahim)", ta: "ஆப்ரஹாம் (இப்ராஹீம்)", verses: 52, revelationOrder: 72, type: "Meccan", taFile: "014 sura ibrahim"},
{ar: "الحجر", en: "Al-Hijr Valley (Al-Hijr)", ta: "அல்-ஹிஜ்ர் பள்ளத்தாக்கு (அல்-ஹிஜ்ர்)", verses: 99, revelationOrder: 54, type: "Meccan", taFile: "015 sura al hijr"},
{ar: "النحل", en: "The Bee (Al-Nahl)", ta: "தேனீ (அல்-நஹ்ல்)", verses: 128, revelationOrder: 70, type: "Meccan", taFile: "016 sura al nahl"},
{ar: "الإسراء", en: "The Children of Israel (Bani Israel)", ta: "இஸ்ரவேலின் சந்ததியர் (பனீ இஸ்ராயீல்)", verses: 111, revelationOrder: 50, type: "Meccan", taFile: "017 sura banee israeel"},
{ar: "الكهف", en: "The Cave (Al-Kahf)", ta: "குகை (அல்-கஹ்ஃப்)", verses: 110, revelationOrder: 69, type: "Meccan", taFile: "018 sura al khahaf"},
{ar: "مريم", en: "Mary (Maryam)", ta: "மேரி (மர்யம்)", verses: 98, revelationOrder: 44, type: "Meccan", taFile: "019 sura mariam"},
{ar: "طه", en: "T.H. (Taha)", ta: "த.ஹ (தாஹா)", verses: 135, revelationOrder: 45, type: "Meccan", taFile: "020 sura thaha"},
{ar: "الأنبياء", en: "The Prophets (Al-Anbiya')", ta: "நபிமார்கள் (அல்-அன்பியா)", verses: 112, revelationOrder: 73, type: "Meccan", taFile: "021 sura al anbiya"},
{ar: "الحج", en: "Pilgrimage (Al-Hajj)", ta: "புனித யாத்திரை (அல்-ஹஜ்)", verses: 78, revelationOrder: 103, type: "Medinan", taFile: "022 sura al haj"},
{ar: "المؤمنون", en: "The Believers (Al-Mu'minun)", ta: "நம்பிக்கையாளர்கள் (அல்-முஃமினூன்)", verses: 118, revelationOrder: 74, type: "Meccan", taFile: "023 sura al moominoon"},
{ar: "النور", en: "Light (Al-Nur)", ta: "ஒளி (அல்-நூர்)", verses: 64, revelationOrder: 102, type: "Medinan", taFile: "024 sura al noor"},
{ar: "الفرقان", en: "The Statute Book (Al-Furqan)", ta: "சட்டப்புத்தகம் (அல்-ஃபுர்கான்)", verses: 77, revelationOrder: 42, type: "Meccan", taFile: "025 sura al furqan"},
{ar: "الشعراء", en: "The Poets (Al-Shu`ara')", ta: "கவிஞர்கள் (அல்-ஷுஃரா)", verses: 227, revelationOrder: 47, type: "Meccan", taFile: "026 sura al shuara"},
{ar: "النمل", en: "The Ant (Al-Naml)", ta: "எறும்பு (அல்-நம்ல்)", verses: 93, revelationOrder: 48, type: "Meccan", taFile: "027 sura al naml"},
{ar: "القصص", en: "History (Al-Qasas)", ta: "வரலாறு (அல்-கஸஸ்)", verses: 88, revelationOrder: 49, type: "Meccan", taFile: "028 sura al kasas"},
{ar: "العنكبوت", en: "The Spider (Al-`Ankabut)", ta: "சிலந்திப்பூச்சி (அல்-'அன்கபூத்)", verses: 69, revelationOrder: 85, type: "Meccan", taFile: "029 sura al ankabooth"},
{ar: "الروم", en: "The Romans (Al-Room)", ta: "ரோமர்கள் (அல்-ரூம்)", verses: 60, revelationOrder: 84, type: "Meccan", taFile: "030 sura al rome"},
{ar: "لقمان", en: "Luqman (Luqman)", ta: "லுக்மான் (லுக்மான்)", verses: 34, revelationOrder: 57, type: "Meccan", taFile: "031 sura lukman"},
{ar: "السجدة", en: "Prostration (Al-Sajdah)", ta: "சிரம் பணிதல் (அல்-ஸஜ்தா)", verses: 30, revelationOrder: 75, type: "Meccan", taFile: "032 sura sajtha"},
{ar: "الأحزاب", en: "The Parties (Al-Ahzab)", ta: "படையினர் (அல்-அஹ்ஸாப்)", verses: 73, revelationOrder: 90, type: "Medinan", taFile: "033 sura al ahzab"},
{ar: "سبإ", en: "Sheba (Saba')", ta: "ஷீபா (ஸபா')", verses: 54, revelationOrder: 58, type: "Meccan", taFile: "034 sura sheeba"},
{ar: "فاطر", en: "Initiator (Faater)", ta: "துவக்கக்கர்த்தா (ஃபாதிர்)", verses: 45, revelationOrder: 43, type: "Meccan", taFile: "035 sura al faathir"},
{ar: "يس", en: "Y.S. (Ya Sin)", ta: "ய.ஸ (யா ஸீன்)", verses: 83, revelationOrder: 41, type: "Meccan", taFile: "036 sura al yasin"},
{ar: "الصافات", en: "The Arrangers (Al-Saffat)", ta: "வரிசைப்படுத்துவோர் (அல்-ஸஃப்ஃபாத்)", verses: 182, revelationOrder: 56, type: "Meccan", taFile: "037 sura al saffath"},
{ar: "ص", en: "S (Saad)", ta: "ஸ (ஸாத்)", verses: 88, revelationOrder: 38, type: "Meccan", taFile: "038 sura al swad"},
{ar: "الزمر", en: "The Throngs (Al-Zumar)", ta: "மக்கள் கூட்டங்கள் (அல்-ஜுமர்)", verses: 75, revelationOrder: 59, type: "Meccan", taFile: "039 sura al jumar"},
{ar: "غافر", en: "Forgiver (Ghafer)", ta: "மன்னிப்பவர் (க்ஹாபிர்)", verses: 85, revelationOrder: 60, type: "Meccan", taFile: "040 sura al khafir"},
{ar: "فصلت", en: "Detailed (Fussilat)", ta: "விவரிக்கப்பட்டது (ஃபுஸ்ஸிலத்)", verses: 54, revelationOrder: 61, type: "Meccan", taFile: "041 sura al fussilath"},
{ar: "الشورى", en: "Consultation (Al-Shura)", ta: "ஆலோசனை (அல்-ஷுரா)", verses: 53, revelationOrder: 62, type: "Meccan", taFile: "042 sura al shura"},
{ar: "الزخرف", en: "Ornaments (Al-Zukhruf)", ta: "ஆபரணங்கள் (அல்-ஜுக்ருஃப்)", verses: 89, revelationOrder: 63, type: "Meccan", taFile: "043 sura al zukhruf"},
{ar: "الدخان", en: "Smoke (Al-Dukhan)", ta: "புகை (அல்-துகான்)", verses: 59, revelationOrder: 64, type: "Meccan", taFile: "044 sura al dhuhan"},
{ar: "الجاثية", en: "Kneeling (Al-Jathiyah)", ta: "மண்டியிடுதல் (அல்-ஜாஸியா)", verses: 37, revelationOrder: 65, type: "Meccan", taFile: "045 sura al jasia"},
{ar: "الأحقاف", en: "The Dunes (Al-Ahqaf)", ta: "மணற்குன்றுகள் (அல்-அஹ்காஃப்)", verses: 35, revelationOrder: 66, type: "Meccan", taFile: "046 sura al ahqaf"},
{ar: "محمد", en: "Muhammad (Muhammad)", ta: "முஹம்மத் (முஹம்மத்)", verses: 38, revelationOrder: 95, type: "Medinan", taFile: "047 sura mohamed"},
{ar: "الفتح", en: "Victory (Al-Fatt-h)", ta: "வெற்றி (அல்-ஃபத்ஹ்)", verses: 29, revelationOrder: 111, type: "Medinan", taFile: "048 sura al fathh"},
{ar: "الحجرات", en: "The Walls (Al-Hujurat)", ta: "சுவர்கள் (அல்-ஹுஜ்ராத்)", verses: 18, revelationOrder: 106, type: "Medinan", taFile: "049 sura al hujraat"},
{ar: "ق", en: "Q (Qaf)", ta: "க (காஃப்)", verses: 45, revelationOrder: 34, type: "Meccan", taFile: "050 sura qaaf"},
{ar: "الذاريات", en: "Drivers of the Winds (Al-Dhariyat)", ta: "காற்றுகளைச் செலுத்துவோர் (அல்-தாரியாத்)", verses: 60, revelationOrder: 67, type: "Meccan", taFile: "051 sura al thariyath"},
{ar: "الطور", en: "Mount Sinai (Al-Toor)", ta: "சினாய் மலை (அல்-தூர்)", verses: 49, revelationOrder: 76, type: "Meccan", taFile: "052 sura al thoor"},
{ar: "النجم", en: "The Stars (Al-Najm)", ta: "நட்சத்திரங்கள் (அல்-நஜ்ம்)", verses: 62, revelationOrder: 23, type: "Meccan", taFile: "053 sura al najm"},
{ar: "القمر", en: "The Moon (Al-Qamar)", ta: "நிலவு (அல்-கமர்)", verses: 55, revelationOrder: 37, type: "Meccan", taFile: "054 sura al qamar"},
{ar: "الرحمن", en: "Most Gracious (Al-Rahman)", ta: "மிக்க அருளாளர் (அல்-ரஹ்மான்)", verses: 78, revelationOrder: 97, type: "Medinan", taFile: "055 sura al rahman"},
{ar: "الواقعة", en: "The Inevitable (Al-Waqi`ah)", ta: "தவிர்க் இயலாதத் (அல்-வாகி'ஆ)", verses: 96, revelationOrder: 46, type: "Meccan", taFile: "056 sura al waakya"},
{ar: "الحديد", en: "Iron (Al-Hadid)", ta: "இரும்பு (அல்-ஹதீத்)", verses: 29, revelationOrder: 94, type: "Medinan", taFile: "057 sura al hadheedh"},
{ar: "المجادلة", en: "The Debate (Al-Mujaadalah)", ta: "தர்க்கம் (அல்-முஜாதலா)", verses: 22, revelationOrder: 105, type: "Medinan", taFile: "058 sura al mujathala"},
{ar: "الحشر", en: "Exodus (Al-Hashr)", ta: "வெளியேற்றம் (அல்-ஹஷ்ர்)", verses: 24, revelationOrder: 101, type: "Medinan", taFile: "059 sura al hasr"},
{ar: "الممتحنة", en: "The Test (Al-Mumtahanah)", ta: "பரிசோதனை (அல்-மும்தஹனஹ்)", verses: 13, revelationOrder: 91, type: "Medinan", taFile: "060 sura al mumthahina"},
{ar: "الصف", en: "The Column (Al-Saff)", ta: "அணிவகுப்பு (அல்-ஸஃப்)", verses: 14, revelationOrder: 109, type: "Medinan", taFile: "061 sura al suf"},
{ar: "الجمعة", en: "Friday (Al-Jumu`ah)", ta: "வெள்ளிக்கிழமை (அல்-ஜுமுஆ)", verses: 11, revelationOrder: 110, type: "Medinan", taFile: "062 sura al jumua"},
{ar: "المنافقون", en: "The Hypocrites (Al-Munafiqun)", ta: "நயவஞ்சகர்கள் (அல்-முனாஃபிகூன்)", verses: 11, revelationOrder: 104, type: "Medinan", taFile: "063 sura al munafiqoon"},
{ar: "التغابن", en: "Mutual Blaming (Al-Taghabun)", ta: "பரஸ்பரம் பழித்துக் கொள்ளுதல் (அல்-தகாபுன்)", verses: 18, revelationOrder: 108, type: "Medinan", taFile: "064 sura al thaghaboon"},
{ar: "الطلاق", en: "Divorce (Al-Talaq)", ta: "விவாகரத்து (அல்-தலாக்)", verses: 12, revelationOrder: 99, type: "Medinan", taFile: "065 sura al thalaak"},
{ar: "التحريم", en: "Prohibition (Al-Tahrim)", ta: "தடை செய்தல் (அல்-தஹ்ரீம்)", verses: 12, revelationOrder: 107, type: "Medinan", taFile: "066 sura al thahrim"},
{ar: "الملك", en: "Kingship (Al-Mulk)", ta: "அரசிமை (அல்-முல்க்)", verses: 30, revelationOrder: 77, type: "Meccan", taFile: "067 sura al mulk"},
{ar: "القلم", en: "The Pen (Al-Qalam)", ta: "பேனா (அல்-கலம்)", verses: 52, revelationOrder: 2, type: "Meccan", taFile: "068 sura al kalam"},
{ar: "الحاقة", en: "Incontestable (Al-Haqqah)", ta: "மறுக்க இயலாதது (அல்-ஹாக்காஹ்)", verses: 52, revelationOrder: 78, type: "Meccan", taFile: "069 sura al haaka"},
{ar: "المعارج", en: "The Heights (Al-Ma`arij)", ta: "உயரங்கள் (அல்-மஆரிஜ்)", verses: 44, revelationOrder: 79, type: "Meccan", taFile: "070 sura al ma aarij"},
{ar: "نوح", en: "Noah (Nuh)", ta: "நோவா (நோவா)", verses: 28, revelationOrder: 71, type: "Meccan", taFile: "071 sura nooh"},
{ar: "الجن", en: "The Jinn (Al-Jinn)", ta: "ஜின்கள் (அல்-ஜின்)", verses: 28, revelationOrder: 40, type: "Meccan", taFile: "072 sura al jin"},
{ar: "المزمل", en: "Cloaked (Al-Muzzammil)", ta: "அங்கி அணிந்தவர் (அல்-முஸ்ஸம்மில்)", verses: 20, revelationOrder: 3, type: "Meccan", taFile: "073 sura al mussammil"},
{ar: "المدثر", en: "The Hidden Secret (Al-Muddaththir)", ta: "மறைக்கப்பட்ட இரகசியம் (அல்-முத்தஸ்ஸிர்)", verses: 56, revelationOrder: 4, type: "Meccan", taFile: "074 sura al muththasir"},
{ar: "القيامة", en: "Resurrection (Al-Qiyamah)", ta: "உயிர்த்தெழுப்புதல் (அல்-கியாமஹ்)", verses: 40, revelationOrder: 31, type: "Meccan", taFile: "075 sura al kiama"},
{ar: "الانسان", en: "The Human (Al-Insan)", ta: "மானிடன் (அல்-இன்ஸான்)", verses: 31, revelationOrder: 98, type: "Medinan", taFile: "076 sura al insaan"},
{ar: "المرسلات", en: "Dispatched (Al-Mursalat)", ta: "அனுப்பப்படுகின்றவர்கள் (அல்-முர்ஸலாத்)", verses: 50, revelationOrder: 33, type: "Meccan", taFile: "077 sura al mursalaath"},
{ar: "النبإ", en: "The Event (Al-Naba')", ta: "அந்த நிகழ்வு (அல்-நபஅ')", verses: 40, revelationOrder: 80, type: "Meccan", taFile: "078 sura al naba"},
{ar: "النازعات", en: "The Snatchers (Al-Nazi`at)", ta: "பறிப்பவர்கள் (அல்-நாஸியாத்)", verses: 46, revelationOrder: 81, type: "Meccan", taFile: "079 sura al nasiyath"},
{ar: "عبس", en: "He Frowned (`Abasa)", ta: "அவர் முகம் சுளித்தார் ('அபஸ)", verses: 42, revelationOrder: 24, type: "Meccan", taFile: "080 sura abasa"},
{ar: "التكوير", en: "The Rolling (Al-Takwir)", ta: "சுருட்டுதல் (அல்-தக்வீர்)", verses: 29, revelationOrder: 7, type: "Meccan", taFile: "081 sura al thakveer"},
{ar: "الإنفطار", en: "The Shattering (Al-Infitar)", ta: "வெடித்துப் பிளதல் (அல்-இன்ஃபிதார்)", verses: 19, revelationOrder: 82, type: "Meccan", taFile: "082 sura al infithaar"},
{ar: "المطففين", en: "The Cheaters (Al-Mutaffifin)", ta: "மோசடியாளர்கள் (அல்-முதஃபிஃபீன்)", verses: 36, revelationOrder: 86, type: "Meccan", taFile: "083 sura al muthafifin"},
{ar: "الإنشقاق", en: "The Rupture (Al-Inshiqaq)", ta: "தகர்க்கப்படுதல் (அல்-இன்ஷிகாக்)", verses: 25, revelationOrder: 83, type: "Meccan", taFile: "084 sura al inshikaak"},
{ar: "البروج", en: "The Galaxies (Al-Buruj)", ta: "நட்சத்திர மண்டலங்கள் (அல்-புரூஜ்)", verses: 22, revelationOrder: 27, type: "Meccan", taFile: "085 sura al brooj"},
{ar: "الطارق", en: "The Bright Star (Al-Tariq)", ta: "பிரகாசமான நட்சத்திரம் (அல்-தாரிக்)", verses: 17, revelationOrder: 36, type: "Meccan", taFile: "086 sura al thariq"},
{ar: "الأعلى", en: "The Most High (Al-A`la)", ta: "மிகவும் மேலானவர் (அல்-அஃலா)", verses: 19, revelationOrder: 8, type: "Meccan", taFile: "087 sura al aalaa"},
{ar: "الغاشية", en: "The Overwhelming (Al-Ghashiyah)", ta: "மூழ்கடித்தல் (அல்-காஷியா)", verses: 26, revelationOrder: 68, type: "Meccan", taFile: "088 sura al gasiya"},
{ar: "الفجر", en: "Dawn (Al-Fajr)", ta: "விடியல் (அல்-ஃபஜ்ர்)", verses: 30, revelationOrder: 10, type: "Meccan", taFile: "089 sura al fajir"},
{ar: "البلد", en: "The Town (Al-Balad)", ta: "நகரம் (அல்-பலத்)", verses: 20, revelationOrder: 35, type: "Meccan", taFile: "090 sura al baladh"},
{ar: "الشمس", en: "The Sun (Al-Shams)", ta: "சூரியன் (அல்-ஷம்ஸ்)", verses: 15, revelationOrder: 26, type: "Meccan", taFile: "091 sura al shams"},
{ar: "الليل", en: "The Night (Al-Layl)", ta: "இரவு (அல்-லைல்)", verses: 21, revelationOrder: 9, type: "Meccan", taFile: "092 sura al lail"},
{ar: "الضحى", en: "The Forenoon (Al-Duha)", ta: "முற்பகல் (அல்-துஹா)", verses: 11, revelationOrder: 11, type: "Meccan", taFile: "093 sura al duhaa"},
{ar: "الشرح", en: "Cooling the Temper (Al-Sharh)", ta: "சுபாவத்தைக் குளிர்விததல் (அல்-ஷ்ரஹ்)", verses: 8, revelationOrder: 12, type: "Meccan", taFile: "094 sura al sharh"},
{ar: "التين", en: "The Fig (Al-Tin)", ta: "அத்தி (அல்-தீன்)", verses: 8, revelationOrder: 28, type: "Meccan", taFile: "095 sura al theen"},
{ar: "العلق", en: "The Embryo (Al-`Alaq)", ta: "கருமுளை (அல்-'அலக்)", verses: 19, revelationOrder: 1, type: "Meccan", taFile: "096 sura al alak"},
{ar: "القدر", en: "Destiny (Al-Qadr)", ta: "விதி (அல்-கத்ர்)", verses: 5, revelationOrder: 25, type: "Meccan", taFile: "097 sura al qadhir"},
{ar: "البينة", en: "Proof (Al-Bayyinah)", ta: "சான்று (அல்-பய்யினஹ்)", verses: 8, revelationOrder: 100, type: "Medinan", taFile: "098 sura al baiena"},
{ar: "الزلزلة", en: "The Quake (Al-Zalzalah)", ta: "அதிர்வு (அல்-ஜல்ஜலஹ்)", verses: 8, revelationOrder: 93, type: "Medinan", taFile: "099 sura al zalzala"},
{ar: "العاديات", en: "The Gallopers (Al-`Adiyat)", ta: "பாய்ந்தோடுபவை (அல்-ஆதியாத்)", verses: 11, revelationOrder: 14, type: "Meccan", taFile: "100 sura al aadhiyath"},
{ar: "القارعة", en: "The Shocker (Al-Qari`ah)", ta: "அதிர்ச்சியூட்டுவத் (அல்-காரியஹ்)", verses: 11, revelationOrder: 30, type: "Meccan", taFile: "101 sura al qariya"},
{ar: "التكاثر", en: "Hoarding (Al-Takathur)", ta: "சேகரித்தல் (அல்-தகாஸுர்)", verses: 8, revelationOrder: 16, type: "Meccan", taFile: "102 sura al thakasur"},
{ar: "العصر", en: "The Afternoon (Al-`Asr)", ta: "பிற்பகல் (அல்-'அஸ்ர்)", verses: 3, revelationOrder: 13, type: "Meccan", taFile: "103 sura al asr"},
{ar: "الهمزة", en: "The Backbiter (Al-Humazah)", ta: "புறங்கூறுபவன் (அல்-ஹுமஜஹ்)", verses: 9, revelationOrder: 32, type: "Meccan", taFile: "104 sura al humajah"},
{ar: "الفيل", en: "The Elephant (Al-Fil)", ta: "யானை (அல்-ஃபீல்)", verses: 5, revelationOrder: 19, type: "Meccan", taFile: "105 sura al fheel"},
{ar: "قريش", en: "The Quraish Tribe (Quraysh)", ta: "குறைஷிக்குலம் (குறைஷ்)", verses: 4, revelationOrder: 29, type: "Meccan", taFile: "106 sura kuraish"},
{ar: "الماعون", en: "Charity (Al-Maa`oon)", ta: "தர்மம் (அல்-மா'ஊன்)", verses: 7, revelationOrder: 17, type: "Meccan", taFile: "107 sura al maaun"},
{ar: "الكوثر", en: "Bounty (Al-Kawthar)", ta: "வெகுமதி (அல்-கவ்த்ஸர்)", verses: 3, revelationOrder: 15, type: "Meccan", taFile: "108 sura al kausar"},
{ar: "الكافرون", en: "The Disbelievers (Al-Kafirun)", ta: "நம்பமறுப்புப்பவர்கள் (அல்-காஃபிரூன்)", verses: 6, revelationOrder: 18, type: "Meccan", taFile: "109 sura al kafiroon"},
{ar: "النصر", en: "Triumph (Al-Nasr)", ta: "வெற்றிக்களிப்பு (அல்-நஸ்ர்)", verses: 3, revelationOrder: 114, type: "Medinan", taFile: "110 sura al nasr"},
{ar: "المسد", en: "Thorns (Al-Masad)", ta: "முட்கள் (அல்-மஸத்)", verses: 5, revelationOrder: 6, type: "Meccan", taFile: "111 sura al masadh"},
{ar: "الإخلاص", en: "Absoluteness (Al-Ikhlas)", ta: "பரிபூரணத்துவம் (அல்-இஃக்லாஸ்)", verses: 4, revelationOrder: 22, type: "Meccan", taFile: "112 sura al iqlas"},
{ar: "الفلق", en: "Daybreak (Al-Falaq)", ta: "வைகறை (அல்-ஃபலக்)", verses: 5, revelationOrder: 20, type: "Meccan", taFile: "113 sura al falaq"},
{ar: "الناس", en: "People (Al-Nas)", ta: "மனிதர்கள் (அல்-நாஸ்)", verses: 6, revelationOrder: 21, type: "Meccan", taFile: "114 sura al naas"}
];

let currentSuraIndex = 0;
let currentLanguage = 'english';
let isPlaying = false;
const audioPlayer = document.getElementById('audioPlayer');

const AUDIO_BASE_PATH = '<?php echo home_url(); ?>/wp-content/uploads/audio/';
const ENGLISH_PATH = AUDIO_BASE_PATH + 'english/';
const TAMIL_PATH = AUDIO_BASE_PATH + 'tamil/';

window.addEventListener('load', function() {
  populateSuraSelect();
  loadSura(0);
  audioPlayer.addEventListener('ended', nextSura);
  audioPlayer.addEventListener('timeupdate', updateProgress);
  audioPlayer.addEventListener('loadedmetadata', updateDuration);
  audioPlayer.addEventListener('error', function(e) {
    console.error('Audio error:', e, audioPlayer.src);
  });
});

function populateSuraSelect() {
  const select = document.getElementById('suraSelect');
  select.innerHTML = '';
  suraData.forEach((sura, index) => {
    const option = document.createElement('option');
    option.value = index;
    option.textContent = (index + 1) + '. ' + (currentLanguage === 'english' ? sura.en : sura.ta);
    select.appendChild(option);
  });
}

function switchLanguage(lang) {
  currentLanguage = lang;
  document.getElementById('englishTab').classList.toggle('active', lang === 'english');
  document.getElementById('tamilTab').classList.toggle('active', lang === 'tamil');
  populateSuraSelect();
  loadSura(currentSuraIndex);
}

function loadSura(index) {
  currentSuraIndex = index;
  const sura = suraData[index];

  document.getElementById('suraNumber').textContent = index + 1;
  document.getElementById('suraArabic').textContent = sura.ar;

  const displayName = currentLanguage === 'english' ? sura.en : sura.ta;
  const icon = sura.type === 'Meccan' ? '<span class="meccan-icon">🕋</span>' : '<span class="medinan-icon">🕌</span>';
  document.getElementById('suraName').innerHTML = displayName + ' ' + icon;
  document.getElementById('suraMeta').textContent = sura.verses + ' Verses • Revelation Order: ' + sura.revelationOrder + ' • ' + sura.type;
  document.getElementById('suraSelect').value = index;

  let audioPath;
  if (currentLanguage === 'english') {
    const suraNum = String(index + 1).padStart(3, '0');
    audioPath = ENGLISH_PATH + 'sura' + suraNum + '.mp3';
  } else {
    audioPath = TAMIL_PATH + sura.taFile + '.mp3';
  }

  audioPlayer.src = audioPath;
  audioPlayer.load();
  isPlaying = false;
  updatePlayButton();
}

function togglePlay() {
  if (isPlaying) {
    audioPlayer.pause();
  } else {
    audioPlayer.play().catch(e => console.error('Play error:', e));
  }
  isPlaying = !isPlaying;
  updatePlayButton();
}

function updatePlayButton() {
  document.getElementById('playIcon').style.display = isPlaying ? 'none' : 'block';
  document.getElementById('pauseIcon').style.display = isPlaying ? 'block' : 'none';
  document.getElementById('playPauseBtn').title = isPlaying ? 'Pause' : 'Play';
}

function previousSura() {
  if (currentSuraIndex > 0) {
    loadSura(currentSuraIndex - 1);
    if (isPlaying) audioPlayer.play();
  }
}

function nextSura() {
  if (currentSuraIndex < suraData.length - 1) {
    loadSura(currentSuraIndex + 1);
    if (isPlaying) audioPlayer.play();
  }
}

function changeSura() {
  loadSura(parseInt(document.getElementById('suraSelect').value));
}

function downloadAudio() {
  const link = document.createElement('a');
  link.href = audioPlayer.src;
  const sura = suraData[currentSuraIndex];
  link.download = 'sura-' + (currentSuraIndex + 1) + '-' + sura.en.split('(')[1].split(')')[0] + '.mp3';
  link.click();
}

function seek(event) {
  const progressBar = document.getElementById('progressBar');
  const percent = event.offsetX / progressBar.offsetWidth;
  audioPlayer.currentTime = percent * audioPlayer.duration;
}

function updateProgress() {
  const percent = (audioPlayer.currentTime / audioPlayer.duration) * 100;
  document.getElementById('progressFill').style.width = percent + '%';
  document.getElementById('currentTime').textContent = formatTime(audioPlayer.currentTime);
}

function updateDuration() {
  document.getElementById('duration').textContent = formatTime(audioPlayer.duration);
}

function formatTime(seconds) {
  if (isNaN(seconds)) return '0:00';
  const mins = Math.floor(seconds / 60);
  const secs = Math.floor(seconds % 60);
  return mins + ':' + secs.toString().padStart(2, '0');
}
</script>

<?php get_footer(); ?>
