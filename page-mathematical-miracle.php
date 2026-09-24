<?php
/**
 * Template: Mathematical Miracle (Appendix 1)
 * Faithful, verbatim reproduction of Appendix 1 of the Authorized English
 * translation of Quran by Rashad Khalifa, Ph.D. (Parts 1 & 2), restyled to
 * GodAlone.in's design system. No text, numbers, or letters altered from
 * the source — only structure, tables and typography were added for clarity.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<style>
/* ============ Mathematical Miracle — scoped styles ============ */
.mm-hero-note{font-family:var(--font-display);font-style:italic;color:var(--gold-tan);font-size:15px;margin-top:6px}
.mm-wrap{max-width:880px;margin:0 auto;padding:0 22px 90px}
.mm-part-tag{display:inline-block;margin:44px 0 10px;font-family:var(--font-body);font-weight:700;font-size:12.5px;
  letter-spacing:3px;text-transform:uppercase;color:var(--gold-tan);border:1px solid var(--line);border-radius:999px;
  padding:7px 16px;background:rgba(216,180,94,.06)}
.mm-toc{background:linear-gradient(180deg,var(--panel),var(--panel-2));border:1px solid var(--line-2);border-radius:var(--radius);
  padding:26px 26px 10px;margin:34px 0 10px}
.mm-toc h2{font-size:20px;margin:0 0 14px}
.mm-toc ol{margin:0;padding:0 0 16px 0;list-style:none;display:grid;grid-template-columns:1fr 1fr;gap:6px 22px}
@media(max-width:640px){.mm-toc ol{grid-template-columns:1fr}}
.mm-toc li{font-size:14.5px}
.mm-toc a{color:var(--ink-soft);display:flex;gap:8px}
.mm-toc a:hover{color:var(--gold-bright)}
.mm-toc .n{color:var(--gold-tan);font-weight:700;min-width:20px}
.mm-section{scroll-margin-top:90px;margin-top:54px}
.mm-section h2{font-size:clamp(24px,3.6vw,32px);border-bottom:1px solid var(--line);padding-bottom:14px;margin-bottom:20px}
.mm-section h3{font-size:20px;color:var(--gold-bright);margin:2em 0 .5em}
.mm-lead{font-size:18.5px!important;color:var(--ink)!important}
.mm-callout{background:rgba(216,180,94,.07);border:1px solid var(--line);border-left:3px solid var(--gold);
  border-radius:12px;padding:18px 22px;margin:1.6em 0}
.mm-callout p{margin:0;font-size:15.5px!important;color:var(--ink-soft)!important}
.mm-callout p+p{margin-top:.8em}
.mm-callout .lbl{display:block;font-weight:700;color:var(--gold-bright);font-size:12.5px;letter-spacing:1.5px;
  text-transform:uppercase;margin-bottom:8px}
.mm-quote{border-left:3px solid var(--gold);padding:4px 0 4px 22px;margin:1.6em 0;font-family:var(--font-display);
  font-style:italic;font-size:19px;color:var(--ink);line-height:1.6}
.mm-quote cite{display:block;margin-top:8px;font-style:normal;font-family:var(--font-body);font-weight:600;
  font-size:12.5px;letter-spacing:1.5px;text-transform:uppercase;color:var(--gold-tan)}
.mm-facts{list-style:none;margin:1.4em 0;padding:0;counter-reset:mmfact}
.mm-facts li{counter-increment:mmfact;display:flex;gap:16px;align-items:baseline;padding:12px 0;
  border-bottom:1px solid var(--line-2);font-size:16.5px;color:var(--ink-soft)}
.mm-facts li::before{content:counter(mmfact);flex:none;width:28px;height:28px;border-radius:50%;
  background:var(--panel-hi);border:1px solid var(--line);color:var(--gold-bright);font-weight:700;font-size:13px;
  display:grid;place-items:center;font-family:var(--font-body)}
.mm-facts .ans{margin-left:auto;padding-left:14px;flex:none;font-weight:700;color:var(--gold-bright);
  font-family:var(--font-body);white-space:nowrap}
.mm-table-wrap{overflow-x:auto;margin:1.6em 0;border:1px solid var(--line-2);border-radius:14px;background:var(--panel-2)}
.mm-tcap{font-family:var(--font-body);font-weight:700;font-size:14px;color:var(--gold-bright);margin:2em 0 .6em;
  padding-left:2px}
table.mm-table{width:100%;border-collapse:collapse;font-size:14.5px;min-width:420px}
table.mm-table th,table.mm-table td{padding:10px 14px;text-align:left;border-bottom:1px solid var(--line-2);
  color:var(--ink-soft);white-space:nowrap}
table.mm-table th{background:var(--panel-hi);color:var(--gold-bright);font-weight:700;font-size:12.5px;
  letter-spacing:.4px;text-transform:uppercase;white-space:normal}
table.mm-table tr:last-child td{border-bottom:none}
table.mm-table tr.mm-tot td{color:var(--ink);font-weight:700;background:rgba(216,180,94,.06)}
table.mm-table td.mm-wrap-cell{white-space:normal;min-width:260px}
.mm-longnum{background:var(--bg-3);border:1px solid var(--line-2);border-radius:12px;padding:16px 18px;margin:1em 0;
  font-family:'Courier New',monospace;font-size:13.5px;color:var(--gold-tan);overflow-x:auto;white-space:pre}
.mm-numlabel{font-family:var(--font-body);font-weight:700;color:var(--gold-bright);font-size:14.5px;margin:1.4em 0 .3em}
.mm-back{display:inline-flex;align-items:center;gap:8px;margin-top:16px;font-size:13.5px}
</style>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">GodAlone.in — Appendix 1</div>
    <h1 class="reveal">Mathematical Miracle</h1>
    <div class="mm-hero-note reveal">Appendix 1 of the Authorized English translation of Quran by Rashad Khalifa, Ph.D.</div>
  </div>
</div>

<div class="verse">
  <div class="q">&ldquo;</div>
  <blockquote>[Quran 74:35] &ldquo;One of the Great Miracles&rdquo;</blockquote>
</div>

<article class="article reveal">
<div class="mm-wrap">

<div class="mm-toc reveal" id="top">
  <h2 class="gold">Contents</h2>
  <ol>
    <li><a href="#simple-to-understand"><span class="n">1.</span> Simple to Understand &mdash; Impossible to Imitate</a></li>
    <li><a href="#simple-facts"><span class="n">2.</span> The Simple Facts</a></li>
    <li><a href="#literary-composition"><span class="n">3.</span> The Literary Mathematical Composition</a></li>
    <li><a href="#gematrical-value"><span class="n">4.</span> What Is A &ldquo;Gematrical Value&rdquo;?</a></li>
    <li><a href="#other-properties"><span class="n">5.</span> Other Mathematical Properties of the Initialed Suras</a></li>
    <li><a href="#major-parameters"><span class="n">6.</span> Major Parameters of the Quranic Initials</a></li>
    <li><a href="#special-words"><span class="n">7.</span> Mathematical Coding of Special Words</a></li>
    <li><a href="#why-19"><span class="n">8.</span> Why 19!</a></li>
    <li><a href="#word-quran"><span class="n">9.</span> The Word &ldquo;Quran&rdquo;</a></li>
    <li><a href="#strong-foundation"><span class="n">10.</span> A Strong Foundation</a></li>
    <li><a href="#five-pillars"><span class="n">11.</span> The Five Pillars of Islam</a></li>
    <li><a href="#mathematical-structure"><span class="n">12.</span> The Quran&rsquo;s Mathematical Structure</a></li>
    <li><a href="#numbers-suras-verses"><span class="n">13.</span> The Numbers of Suras and Verses</a></li>
    <li><a href="#superhuman-combinations"><span class="n">14.</span> Superhuman Numerical Combinations</a></li>
    <li><a href="#witness"><span class="n">15.</span> A Witness From the Children of Israel</a></li>
  </ol>
</div>

<span class="mm-part-tag">Part 1</span>

<p class="mm-lead">The Quran is characterized by a unique phenomenon never found in any human authored book. Every element of the Quran is mathematically composed &mdash; the suras, the verses, the words, the number of certain letters, the number of words from the same root, the number and variety of divine names, the unique spelling of certain words, the absence or deliberate alteration of certain letters within certain words, and many other elements of the Quran besides its content. There are two major facets of the Quran&rsquo;s mathematical system: (1) The mathematical literary composition, and (2) The mathematical structure involving the numbers of suras and verses. Because of this comprehensive mathematical coding, the slightest distortion of the Quran&rsquo;s text or physical arrangement is immediately exposed.</p>

<div class="mm-section" id="simple-to-understand">
<h2>Simple to Understand &mdash; Impossible to Imitate</h2>
<p>For the first time in history we have a scripture with built-in proof of divine authorship &mdash; a superhuman mathematical composition.</p>
<p>Any reader of this book can easily verify the Quran&rsquo;s mathematical miracle. The word &ldquo;God&rdquo; (Allah) is written in bold capital letters throughout the text. The cumulative frequency of occurrence of the word &ldquo;God&rdquo; is noted at the bottom of each page in the left hand corner. The number in the right hand corner is the cumulative total of the numbers for verses containing the word &ldquo;God.&rdquo; The last page of the text, Page 372, shows that the total occurrence of the word &ldquo;God&rdquo; is 2698, or 19x142. The total sum of verse numbers for all verses containing the word &ldquo;God&rdquo; is 118123, also a multiple of 19 (118123 = 19x6217).</p>
<div class="mm-callout"><p>Nineteen is the common denominator throughout the Quran&rsquo;s mathematical system.</p></div>
<p>This phenomenon alone suffices as incontrovertible proof that the Quran is God&rsquo;s message to the world. No human being(s) could have kept track of 2698 occurrences of the word &ldquo;God,&rdquo; and the numbers of verses where they occur. This is especially impossible in view of (1) the age of ignorance during which the Quran was revealed, and (2) the fact that the suras and verses were widely separated in time and place of revelation. The chronological order of revelation was vastly different from the final format (Appendix 23). However, the Quran&rsquo;s mathematical system is not limited to the word &ldquo;God;&rdquo; it is extremely vast, extremely intricate, and totally comprehensive.</p>
</div>

<div class="mm-section" id="simple-facts">
<h2>The Simple Facts</h2>
<p>Like the Quran itself, the Quran&rsquo;s mathematical coding ranges from the very simple, to the very complex. The Simple Facts are those observations that can be ascertained without using any tools. The complex facts require the assistance of a calculator or a computer. The following facts do not require any tools to be verified, but please remember they all refer to the original Arabic text:</p>
<ol class="mm-facts">
<li>The first verse (1:1), known as &ldquo;Basmalah,&rdquo; consists of 19 letters.</li>
<li>The Quran consists of 114 suras, which is <span class="ans">19 x 6</span></li>
<li>The total number of verses in the Quran is 6346, or <span class="ans">19 x 334</span></li>
<li>[6234 numbered verses &amp; 112 un-numbered verses (Basmalahs) 6234+112 = 6346] Note that 6+3+4+6 = <span class="ans">19</span></li>
<li>The Basmalah occurs 114 times, despite its conspicuous absence from Sura 9 (it occurs twice in Sura 27) &amp; 114 = <span class="ans">19x6</span></li>
<li>From the missing Basmalah of Sura 9 to the extra Basmalah of Sura 27, there are precisely <span class="ans">19 suras</span></li>
<li>It follows that the total of the sura numbers from 9 to 27 (9+10+11+12+&hellip;+26+27) is 342, or <span class="ans">19 x 18</span></li>
<li>This total (342) also equals the number of words between the two Basmalahs of Sura 27, and 342 = <span class="ans">19 x 18</span></li>
<li>The famous first revelation (96:1-5) consists of <span class="ans">19 words</span></li>
<li>This 19-worded first revelation consists of 76 letters <span class="ans">19 x 4</span></li>
<li>Sura 96, first in the chronological sequence, consists of <span class="ans">19 verses</span></li>
<li>This first chronological sura is placed atop the last <span class="ans">19 suras</span></li>
<li>Sura 96 consists of 304 Arabic letters, and 304 equals <span class="ans">19 x 16</span></li>
<li>The last revelation (Sura 110) consists of <span class="ans">19 words</span></li>
<li>The first verse of the last revelation (110:1) consists of <span class="ans">19 letters</span></li>
<li>14 different Arabic letters, form 14 different sets of &ldquo;Quranic Initials&rdquo; (such as A.L.M. of 2:1), and prefix 29 suras. These numbers add up to 14+14+29 = 57 = <span class="ans">19 x 3</span></li>
<li>The total of the 29 sura numbers where the Quranic Initials occur is 2+3+7+&hellip;+50+68 = 822, and 822+14 (14 sets of initials) equals 836, or <span class="ans">19 x 44</span></li>
<li>Between the first initialed sura (Sura 2) and the last initialed sura (Sura 68) there are 38 un-initialed suras <span class="ans">19 x 2</span></li>
<li>Between the first and last initialed sura there are <span class="ans">19 sets</span> of alternating &ldquo;initialed&rdquo; and &ldquo;un-initialed&rdquo; suras.</li>
<li>The Quran mentions 30 different numbers: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 19, 20, 30, 40, 50, 60, 70, 80, 99, 100, 200, 300, 1000, 2000, 3000, 5000, 50,000, &amp; 100,000. The sum of these numbers is 162146, which equals <span class="ans">19x8534</span></li>
</ol>
<p>This is a condensed summary of the Simple Facts.</p>
<div class="mm-callout"><span class="lbl">Quran Inspector / Mod19</span><p>A computer program to help divide very long numbers and count Quranic initials.</p></div>
</div>

<div class="mm-section" id="literary-composition">
<h2>The Literary Mathematical Composition</h2>

<div class="mm-tcap">Table 1: List of the Quranic Initials and Their Suras</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>No.</th><th>Sura No.</th><th>Sura Title</th><th>Quranic Initials</th></tr></thead>
<tbody>
<tr><td>1</td><td>2</td><td>The Heifer</td><td>A.L.M</td></tr>
<tr><td>2</td><td>3</td><td>The Amramites</td><td>A.L.M</td></tr>
<tr><td>3</td><td>7</td><td>The Purgatory</td><td>A.L.M.S.</td></tr>
<tr><td>4</td><td>10</td><td>Jonah</td><td>A.L.R.</td></tr>
<tr><td>5</td><td>11</td><td>Hud</td><td>A.L.R.</td></tr>
<tr><td>6</td><td>12</td><td>Joseph</td><td>A.L.R.</td></tr>
<tr><td>7</td><td>13</td><td>Thunder</td><td>A.L.M.R.</td></tr>
<tr><td>8</td><td>14</td><td>Abraham</td><td>A.L.R.</td></tr>
<tr><td>9</td><td>15</td><td>Al-Hijr Valley</td><td>A.L.R.</td></tr>
<tr><td>10</td><td>19</td><td>Mary</td><td>K.H.Y.`A.S.</td></tr>
<tr><td>11</td><td>20</td><td>T.H.</td><td>T.H.</td></tr>
<tr><td>12</td><td>26</td><td>The Poets</td><td>T.S.M.</td></tr>
<tr><td>13</td><td>27</td><td>The Ant</td><td>T.S.</td></tr>
<tr><td>14</td><td>28</td><td>History</td><td>T.S.M.</td></tr>
<tr><td>15</td><td>29</td><td>The Spider</td><td>A.L.M</td></tr>
<tr><td>16</td><td>30</td><td>The Romans</td><td>A.L.M</td></tr>
<tr><td>17</td><td>31</td><td>Luqmaan</td><td>A.L.M</td></tr>
<tr><td>18</td><td>32</td><td>Prostration</td><td>A.L.M</td></tr>
<tr><td>19</td><td>36</td><td>Y.S.</td><td>Y.S.</td></tr>
<tr><td>20</td><td>38</td><td>S.</td><td>S.</td></tr>
<tr><td>21</td><td>40</td><td>Forgiver</td><td>H.M.</td></tr>
<tr><td>22</td><td>41</td><td>Elucidated</td><td>H.M.</td></tr>
<tr><td>23</td><td>42</td><td>Consultation</td><td>H.M.`A.S.Q.</td></tr>
<tr><td>24</td><td>43</td><td>Ornaments</td><td>H.M.</td></tr>
<tr><td>25</td><td>44</td><td>Smoke</td><td>H.M.</td></tr>
<tr><td>26</td><td>45</td><td>Kneeling</td><td>H.M.</td></tr>
<tr><td>27</td><td>46</td><td>The Dunes</td><td>H.M.</td></tr>
<tr><td>28</td><td>50</td><td>Q.</td><td>Q.</td></tr>
<tr><td>29</td><td>68</td><td>The Pen</td><td>NuN</td></tr>
</tbody></table></div>

<p>The Quran is characterized by a unique phenomenon never found in any other book; 29 suras are prefixed with 14 different sets of &ldquo;Quranic Initials,&rdquo; consisting of one to five letters per set. Fourteen letters, half the Arabic alphabet, participate in these initials. The significance of the Quranic initials remained a divinely guarded secret for 14 centuries. The Quran states in 10:20 and 25:4-6 that its miracle, i.e., proof of divine authorship, was destined to remain secret for a specific predetermined interim:</p>

<div class="mm-quote">They say, &ldquo;How come no miracle came down to him from his Lord?&rdquo; Say, &ldquo;The future belongs to God; so wait, and I am waiting along with you.&rdquo;<cite>Quran 10:20</cite></div>

<div class="mm-quote">Those who disbelieved said, &ldquo;This is a fabrication that he produced, with the help of some other people.&rdquo; They have uttered a blasphemy and a falsehood. They also said, &ldquo;Tales from the past that he wrote down; they were dictated to him day and night.&rdquo; Say, &ldquo;This was revealed by the One who knows the Secret in the heavens and the earth. He is Forgiving, Most Merciful.&rdquo;<cite>Quran 25:4-6</cite></div>

<p>The Quranic Initials constitute a major portion of the Quran&rsquo;s 19-based mathematical miracle.</p>

<h3>Historical Background</h3>
<p>In 1968, I realized that the existing English translations of the Quran did not present the truthful message of God&rsquo;s Final Testament. For example, the two most popular translators, Yusuf Ali and Marmaduke Pickthall, could not overcome their corrupted religious traditions when it came to the Quran&rsquo;s great criterion in 39:45.</p>

<div class="mm-quote">&ldquo;When God ALONE is mentioned, the hearts of those who do not believe in the Hereafter shrink with aversion. But when others are mentioned beside Him, they rejoice.&rdquo;<cite>Quran 39:45</cite></div>

<p>Yusuf Ali omitted the crucial word &ldquo;ALONE&rdquo; from his translation, and altered the rest of the verse by inserting the word &ldquo;(gods).&rdquo; Thus, he utterly destroyed this most important Quranic criterion. He translated 39:45 as follows:</p>

<div class="mm-callout"><p>&ldquo;When God, the One and Only, is mentioned, the hearts of those who believe not in the Hereafter are filled with disgust and horror; but when (gods) other than He are mentioned, behold, they are filled with joy.&rdquo; [39:45] (according to A. Yusuf Ali)</p></div>

<p>The expression &ldquo;When God, the One and Only, is mentioned,&rdquo; is not the same as saying, &ldquo;When God alone is mentioned.&rdquo; One can mention &ldquo;God, the One and Only,&rdquo; and also mention Muhammad or Jesus, and no one will be upset. But if &ldquo;God ALONE is mentioned,&rdquo; you cannot mention anyone else, and a lot of people &mdash; those who idolize Muhammad or Jesus &mdash; will be upset. Thus, Yusuf Ali could not bring himself to present the truth of the Quran, if it exposed his corrupted belief.</p>

<p>Marmaduke Pickthall translated &ldquo;ALONE&rdquo; correctly, but destroyed the criterion by inserting his personal belief in parentheses; he translated 39:45 as follows:</p>

<div class="mm-callout"><p>&ldquo;And when Allah alone is mentioned, the hearts of those who believe not in the Hereafter are repelled, and when those (whom they worship) beside Him are mentioned, behold! they are glad.&rdquo; [39:45] (according to Marmaduke Pickthal)</p></div>

<p>When I saw the truth of God&rsquo;s word thus distorted, I decided to translate the Quran, at least for the benefit of my own children. Since I was a chemist by profession, and despite my extensive religious background &mdash; my father was a renowned Sufi leader in Egypt &mdash; I vowed to God that I would not move from one verse to the next unless I fully understood it.</p>

<p>I purchased all the available books of Quranic translations and exegeses (Tafseer) I could find, placed them on a large table, and began my translation. The first sura, The Key, was completed in a few days. The first verse in Sura 2 is &ldquo;A.L.M.&rdquo; The translation of this verse took four years, and coincided with the divine unveiling of &ldquo;the secret,&rdquo; the great mathematical Miracle of the Quran.</p>

<p>The books of Quranic exegeses unanimously agreed that &ldquo;no one knows the meaning or significance of the Quranic Initials A.L.M., or any other initials.&rdquo; I decided to write the Quran into the computer, analyze the whole text, and see if there were any mathematical correlations among these Quranic initials.</p>

<p>I used a time-share terminal, connected by telephone to a giant computer. To test my hypothesis, I decided to look at the single-lettered Quranic Initials &mdash; &ldquo;Q&rdquo; (Qaaf) of Suras 42 and 50, &ldquo;S&rdquo; (Saad) of Suras 7, 19, and 38, and &ldquo;N&rdquo; (Noon) of Sura 68. As detailed in my first book MIRACLE OF THE QURAN: SIGNIFICANCE OF THE MYSTERIOUS ALPHABETS (Islamic Productions, 1973), many previous attempts to unravel the mystery had failed.</p>

<h3>The Quranic Initial &ldquo;Q&rdquo; (Qaaf)</h3>
<p>The computer data showed that the text of the only Q-initialed suras, 42 and 50, contained the same number of Q&rsquo;s, 57 and 57. That was the first hint that a deliberate mathematical system might exist in the Quran.</p>
<p>Sura 50 is entitled &ldquo;Q,&rdquo; prefixed with &ldquo;Q,&rdquo; and the first verse reads, &ldquo;Q, and the glorious Quran.&rdquo; This indicated that &ldquo;Q&rdquo; stands for &ldquo;Quran,&rdquo; and the total number of Q&rsquo;s in the two Q-initialed suras represents the Quran&rsquo;s 114 suras (57+57 = 114 = 19x6). This idea was strengthened by the fact that &ldquo;the Quran&rdquo; occurs in the Quran 57 times.</p>
<p>The Quran is described in Sura &ldquo;Q&rdquo; as &ldquo;Majid&rdquo; (glorious), and the Arabic word &ldquo;Majid&rdquo; has a gematrical value of 57: M (40) + J (3) + I (10) + D (4) = 57.</p>
<p>Sura 42 consists of 53 verses, and 42 + 53 = 95 = 19x5.</p>
<p>Sura 50 consists of 45 verses, and 50 + 45 = 95, same total as in Sura 42.</p>
<p>By counting the letter &ldquo;Q&rdquo; in every &ldquo;Verse 19&rdquo; throughout the Quran, the total count comes to 76, 19x4. Here is a summary of the Q-related data:</p>
<ol class="mm-facts">
<li>The frequency of occurrence of &ldquo;Q&rdquo; in Sura &ldquo;Q&rdquo; (No. 50) is 57, <span class="ans">19x3</span></li>
<li>The letter &ldquo;Q&rdquo; occurs in the other Q-initialed sura (No. 42) exactly the same number of times, <span class="ans">57</span></li>
<li>The total occurrence of the letter &ldquo;Q&rdquo; in the two Q-initialed suras is 114, which equals <span class="ans">the number of suras</span> in the Quran.</li>
<li>&ldquo;The Quran&rdquo; is mentioned in the Quran <span class="ans">57 times</span></li>
<li>The description of the Quran as &ldquo;Majid&rdquo; (Glorious) is correlated with the frequency of occurrence of the letter &ldquo;Q&rdquo; in each of the Q-initialed suras. The word &ldquo;Majid&rdquo; has a gematrical value of <span class="ans">57</span></li>
<li>Sura 42 consists of 53 verses, and 42 + 53 is 95, or <span class="ans">19x5</span></li>
<li>Sura 50 consists of 45 verses, and 50 + 45 is also 95, <span class="ans">19x5</span></li>
<li>The number of Q&rsquo;s in all verses numbered &ldquo;19&rdquo; throughout the Quran is 76, <span class="ans">19x4</span></li>
</ol>
<p>Glimpses of the Quran&rsquo;s mathematical composition began to emerge. For example, it was observed that the people who disbelieved in Lot are mentioned in 50:13 and occur in the Quran 13 times &mdash; 7:80; 11:70, 11:74, 11:89; 21:74; 22:43; 26:160; 27:54, 27:56; 29:28; 38:13; 50:13; and 54:33. Consistently, they are referred to as &ldquo;Qawm,&rdquo; with the single exception of the Q-initialed Sura 50 where they are referred to as &ldquo;Ikhwaan.&rdquo; Obviously, if the regular, Q-containing word &ldquo;Qawm&rdquo; were used, the count of the letter &ldquo;Q&rdquo; in Sura 50 would have become 58, and this whole phenomenon would have disappeared. With the recognized absolute accuracy of mathematics, the alteration of a single letter destroys the system.</p>
<p>Another relevant example is the reference to Mecca in 3:96 as &ldquo;Becca&rdquo;! This strange spelling of the renowned city has puzzled Islamic scholars for many centuries. Although Mecca is mentioned in the Quran properly spelled in 48:24, the letter &ldquo;M&rdquo; is substituted with a &ldquo;B&rdquo; in 3:96. It turns out that Sura 3 is an M-initialed sura, and the count of the letter &ldquo;M&rdquo; would have deviated from the Quran&rsquo;s code if &ldquo;Mecca&rdquo; was spelled correctly in 3:96.</p>

<h3>NuN (Noon)</h3>
<p>This initial is unique; it occurs in one sura, 68, and the name of the letter is spelled out as three letters &mdash; Noon Wow Noon &mdash; in the original text, and is therefore counted as two N&rsquo;s. The total count of this letter in the N-initialed sura is 133, 19x7.</p>
<p>The fact that &ldquo;N&rdquo; is the last Quranic Initial (see Table 1) brings out a number of special observations. For example, the number of verses from the first Quranic Initial (A.L.M. of 2:1) to the last initial (N. of 68:1) is 5263, or 19x277.</p>
<p>The word &ldquo;God&rdquo; (Allah) occurs 2641 (19x139) times between the first initial and the last initial. Since the total occurrence of the word &ldquo;God&rdquo; is 2698, it follows that its occurrence outside the initials &ldquo;A.L.M.&rdquo; of 2:1 on one side, and the initial &ldquo;N&rdquo; of 68:1 on the other side, is 57, 19x3. Tables 9 to 20 prove that the initial &ldquo;NuN&rdquo; must be spelled out to show two N&rsquo;s.</p>

<h3>S (Saad)</h3>
<div class="mm-tcap">Table 2: The Frequency of Occurrence of the Letter &ldquo;S&rdquo; in the Saad-initialed Suras</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura</th><th>Frequency of &ldquo;S&rdquo;</th></tr></thead>
<tbody>
<tr><td>7</td><td>97</td></tr>
<tr><td>19</td><td>26</td></tr>
<tr><td>38</td><td>29</td></tr>
<tr class="mm-tot"><td>Total</td><td>152 (19x8)</td></tr>
</tbody></table></div>
<p>This initial prefixes three suras, 7, 19, and 38, and the total occurrence of the letter &ldquo;S&rdquo; (Saad) in these three suras is 152, 19x8 (Table 2). It is noteworthy that in 7:69, the word &ldquo;Bastatan&rdquo; is written in some printings with a &ldquo;Saad,&rdquo; instead of &ldquo;Seen.&rdquo; This is an erroneous distortion that violates the Quran&rsquo;s code. By looking at the oldest available copy of the Quran, the Tashkent Copy, it was found that the word &ldquo;Bastatan&rdquo; is correctly written with a &ldquo;Seen.&rdquo;</p>

<div class="mm-callout"><span class="lbl">Historical Note</span><p>The momentous discovery that &ldquo;19&rdquo; is the Quran&rsquo;s common denominator became a reality in January 1974, coinciding with Zul-Hijjah 1393 A.H. The Quran was revealed in 13 B.H. (Before Hijrah). This makes the number of years from the revelation of the Quran to the revelation of its miracle 1393 + 13 = 1406 = 19x74. As noted above, the unveiling of the Miracle took place in January 1974. The correlation between 19x74 lunar years and 1974 solar years could not escape notice. This is especially uncanny in view of the fact that &ldquo;19&rdquo; is mentioned in Sura 74.</p></div>

<h3>Y. S. (Ya Seen)</h3>
<p>These two letters prefix Sura 36. The letter &ldquo;Y&rdquo; occurs in this sura 237 times, while the letter &ldquo;S&rdquo; (Seen) occurs 48 times. The total of both letters is 285, 19x15.</p>
<p>It is noteworthy that the letter &ldquo;Y&rdquo; is written in the Quran in two forms; one is obvious and the other is subtle. The subtle form of the letter may be confusing to those who are not thoroughly familiar with the Arabic language. A good example is the word &ldquo;Araany&rdquo; which is mentioned twice in 12:36. The letter &ldquo;Y&rdquo; is used twice in this word, the first &ldquo;Y&rdquo; is subtle and the second is obvious. Sura 36 does not contain a single &ldquo;Y&rdquo; of the subtle type. This is a remarkable phenomenon, and one that does not normally occur in a long sura like Sura 36. In my book QURAN: VISUAL PRESENTATION OF THE MIRACLE (Islamic Productions, 1982) every &ldquo;Y&rdquo; and &ldquo;S&rdquo; in Sura 36 is marked with a star.</p>

<h3>H.M. (Ha Mim)</h3>
<div class="mm-tcap">Table 3: Occurrence of the Letters &ldquo;H&rdquo; and &ldquo;M&rdquo; in the Seven H.M. Initialed Suras</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura No.</th><th>&ldquo;H&rdquo;</th><th>&ldquo;M&rdquo;</th><th>&ldquo;H+M&rdquo;</th></tr></thead>
<tbody>
<tr><td>40</td><td>64</td><td>380</td><td>444</td></tr>
<tr><td>41</td><td>48</td><td>276</td><td>324</td></tr>
<tr><td>42</td><td>53</td><td>300</td><td>353</td></tr>
<tr><td>43</td><td>44</td><td>324</td><td>368</td></tr>
<tr><td>44</td><td>16</td><td>150</td><td>166</td></tr>
<tr><td>45</td><td>31</td><td>200</td><td>231</td></tr>
<tr><td>46</td><td>36</td><td>225</td><td>261</td></tr>
<tr class="mm-tot"><td>Total</td><td>292</td><td>1855</td><td>2147 (19x113)</td></tr>
</tbody></table></div>
<p>Seven suras are prefixed with the letters &ldquo;H&rdquo; and &ldquo;M;&rdquo; Suras 40 through 46. The total occurrence of these two letters in the seven H.M.-initialed suras is 2147, or 19x113. The detailed data are shown in Table 3. Naturally, the alteration of a single letter &ldquo;H&rdquo; or &ldquo;M&rdquo; in any of the seven H.M.-initialed suras would have destroyed this intricate phenomenon.</p>

<h3>`A.S.Q. (`Ayn Seen Qaf)</h3>
<p>These initials constitute Verse 2 of Sura 42, and the total occurrence of these letters in this sura is 209, or 19x11. The letter &ldquo; `A&rdquo; (`Ayn) occurs 98 times, the letter &ldquo;S&rdquo; (Seen) occurs 54 times, and the letter &ldquo;Q&rdquo; (Qaf) occurs 57 times.</p>

<div class="mm-callout"><span class="lbl">Editorial addition to appx 1 by Submission.org team</span><p>HM initialed suras, a great miracle within the miracle.</p></div>

<div class="mm-tcap">HM-initialed suras &mdash; frequency of &ldquo;H&rdquo; and &ldquo;M,&rdquo; and digit sums</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Chapter</th><th>Prefixes</th><th>Freq. (H)</th><th>Freq. (M)</th><th>Sum of numbers</th><th>Sum of digits</th></tr></thead>
<tbody>
<tr><td>40</td><td>H M</td><td>64</td><td>380</td><td>444</td><td>21</td></tr>
<tr><td>41</td><td>H M</td><td>48</td><td>276</td><td>324</td><td>27</td></tr>
<tr><td>42</td><td>H M `A S Q</td><td>53</td><td>300</td><td>353</td><td>11</td></tr>
<tr><td>43</td><td>H M</td><td>44</td><td>324</td><td>368</td><td>17</td></tr>
<tr><td>44</td><td>H M</td><td>16</td><td>150</td><td>166</td><td>13</td></tr>
<tr><td>45</td><td>H M</td><td>31</td><td>200</td><td>231</td><td>6</td></tr>
<tr><td>46</td><td>H M</td><td>36</td><td>225</td><td>261</td><td>18</td></tr>
</tbody></table></div>
<p>Numbers in purple add up to 19 x 59 and the sum of the digits for these numbers is also 59. Numbers in green add up to 19 x 54 and sum of the digits for these numbers is also 54. Numbers in blue add up to 19 x 55 and the sum of the digits for these numbers is also 55. Numbers in grey add up to 19 x 58 and the sum of the digits for these numbers is also 58.</p>

<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Chapter</th><th>(Hah)</th><th>(Meem)</th><th>Add the Digits of the Counts</th><th>Total</th></tr></thead>
<tbody>
<tr><td>40</td><td>64</td><td>380</td><td>3 + 8 + 0 + 6 + 4</td><td>21</td></tr>
<tr><td>41</td><td>48</td><td>276</td><td>2 + 7 + 6 + 4 + 8</td><td>27</td></tr>
<tr><td>42</td><td>53</td><td>300</td><td>3 + 0 + 0 + 5 + 3</td><td>11</td></tr>
<tr><td>43</td><td>44</td><td>324</td><td>3 + 2 + 4 + 4 + 4</td><td>17</td></tr>
<tr><td>44</td><td>16</td><td>150</td><td>1 + 5 + 0 + 1 + 6</td><td>13</td></tr>
<tr><td>45</td><td>31</td><td>200</td><td>2 + 0 + 0 + 3 + 1</td><td>6</td></tr>
<tr><td>46</td><td>36</td><td>225</td><td>2 + 2 + 5 + 3 + 6</td><td>18</td></tr>
<tr class="mm-tot"><td>Total</td><td>292</td><td>2147 (19x113)</td><td>16 + 24 + 15 + 26 + 32</td><td>113</td></tr>
</tbody></table></div>

<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Chapter</th><th>(Hah)</th><th>(Meem)</th><th>Add the Digits of the Counts</th><th>Total</th></tr></thead>
<tbody>
<tr><td>40</td><td>64</td><td>380</td><td>3 + 8 + 0 + 6 + 4</td><td>21</td></tr>
<tr><td>41</td><td>48</td><td>276</td><td>2 + 7 + 6 + 4 + 8</td><td>27</td></tr>
<tr><td>42</td><td>53</td><td>300</td><td>3 + 0 + 0 + 5 + 3</td><td>11</td></tr>
<tr class="mm-tot"><td>Total</td><td>1121</td><td>(19x59)</td><td>9 + 15 + 6 + 15 + 15</td><td>59</td></tr>
</tbody></table></div>

<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Chapter</th><th>(Hah)</th><th>(Meem)</th><th>Add the Digits of the Counts</th><th>Total</th></tr></thead>
<tbody>
<tr><td>43</td><td>44</td><td>324</td><td>3 + 2 + 4 + 4 + 4</td><td>17</td></tr>
<tr><td>44</td><td>16</td><td>150</td><td>1 + 5 + 0 + 1 + 6</td><td>13</td></tr>
<tr><td>45</td><td>31</td><td>200</td><td>2 + 0 + 0 + 3 + 1</td><td>6</td></tr>
<tr><td>46</td><td>36</td><td>225</td><td>2 + 2 + 5 + 3 + 6</td><td>18</td></tr>
<tr class="mm-tot"><td>Total</td><td>1026</td><td>(19x54)</td><td>8 + 9 + 9 + 11 + 17</td><td>54</td></tr>
</tbody></table></div>

<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Chapter</th><th>(Hah)</th><th>(Meem)</th><th>Add the Digits of the Counts</th><th>Total</th></tr></thead>
<tbody>
<tr><td>41</td><td>48</td><td>276</td><td>2 + 7 + 6 + 4 + 8</td><td>27</td></tr>
<tr><td>42</td><td>53</td><td>300</td><td>3 + 0 + 0 + 5 + 3</td><td>11</td></tr>
<tr><td>43</td><td>44</td><td>324</td><td>3 + 2 + 4 + 4 + 4</td><td>17</td></tr>
<tr class="mm-tot"><td>Total</td><td>1045</td><td>(19x55)</td><td>8 + 9 + 10 + 13 + 15</td><td>55</td></tr>
</tbody></table></div>

<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Chapter</th><th>(Hah)</th><th>(Meem)</th><th>Add the Digits of the Counts</th><th>Total</th></tr></thead>
<tbody>
<tr><td>40</td><td>64</td><td>380</td><td>3 + 8 + 0 + 6 + 4</td><td>21</td></tr>
<tr><td>44</td><td>16</td><td>150</td><td>1 + 5 + 0 + 1 + 6</td><td>13</td></tr>
<tr><td>45</td><td>31</td><td>200</td><td>2 + 0 + 0 + 3 + 1</td><td>6</td></tr>
<tr><td>46</td><td>36</td><td>225</td><td>2 + 2 + 5 + 3 + 6</td><td>18</td></tr>
<tr class="mm-tot"><td>Total</td><td>1102</td><td>(19x58)</td><td>8 + 15 + 5 + 13 + 17</td><td>58</td></tr>
</tbody></table></div>

<div class="mm-callout"><span class="lbl">Submission.org editorial note</span><p>A thorough recount of the Quranic initials, conducted in 2002, by Submission.org, using both manual as well as two different computer counting programs, has confirmed Dr. Rashad Khalifa&rsquo;s counts of all the Quranic initials except for a few counts in the initials &ldquo;A&rdquo; (Alef) and &ldquo;L&rdquo; (Laam). However, the recent recount of Quranic initials remains divisible by 19 and is a part of the Mathematical Miracle of the Quran. The latest information on the research of this recount can be reviewed here: The updated count of the Quranic initials, ALM and ALR and The updated count of the Quranic initials, ALMR and ALMS. The latest details of the recounts can be reviewed and verified using Quran Inspector.</p>
<p>Research on the &ldquo;A&rdquo; (alef) and &ldquo;L&rdquo; (Lam) counts is ongoing.</p></div>

<h3>A.L.M. (Alef Laam Mim)</h3>
<div class="mm-tcap">Table 4: Occurrence of the Letters &ldquo;A,&rdquo; &ldquo;L,&rdquo; and &ldquo;M&rdquo; in the A.L.M.-Initialed Suras</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura No.</th><th>&ldquo;A&rdquo;</th><th>&ldquo;L&rdquo;</th><th>&ldquo;M&rdquo;</th><th>Total</th></tr></thead>
<tbody>
<tr><td>2</td><td>4502</td><td>3202</td><td>2195</td><td>9899 (19x521)</td></tr>
<tr><td>3</td><td>2521</td><td>1892</td><td>1249</td><td>5662 (19x298)</td></tr>
<tr><td>29</td><td>774</td><td>554</td><td>344</td><td>1672 (19x88)</td></tr>
<tr><td>30</td><td>544</td><td>393</td><td>317</td><td>1254 (19x66)</td></tr>
<tr><td>31</td><td>347</td><td>297</td><td>173</td><td>817 (19x43)</td></tr>
<tr><td>32</td><td>257</td><td>155</td><td>158</td><td>570 (19x30)</td></tr>
<tr class="mm-tot"><td>Total</td><td>8945</td><td>6493</td><td>4436</td><td>19874 (19x1046)</td></tr>
</tbody></table></div>
<p>The letters &ldquo;A,&rdquo; &ldquo;L,&rdquo; and &ldquo;M&rdquo; are the most frequently used letters in the Arabic language, and in the same order as we see in the Quranic Initials &mdash; &ldquo;A,&rdquo; then &ldquo;L,&rdquo; then &ldquo;M.&rdquo; These letters prefix six suras &mdash; 2, 3, 29, 30, 31, and 32 and the total occurrence of the three letters in each of the six suras is a multiple of 19 [9899 (19x521), 5662 (19x298), 1672 (19x88), 1254 (19x66), 817 (19x43), and 570 (19x30), respectively]. Thus, the total occurrence of the three letters in the six suras is 19874 (19x1046), and the alteration of one of these letters destroys this phenomenon.</p>

<h3>A.L.R. (Alef Laam Ra)</h3>
<div class="mm-tcap">Table 5: Occurrence of the Letters &ldquo;A,&rdquo; &ldquo;L,&rdquo; and &ldquo;R&rdquo; in the A.L.R.-Initialed Suras</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura No.</th><th>&ldquo;A&rdquo;</th><th>&ldquo;L&rdquo;</th><th>&ldquo;R&rdquo;</th><th>Total</th></tr></thead>
<tbody>
<tr><td>10</td><td>1319</td><td>913</td><td>257</td><td>2489 (19x131)</td></tr>
<tr><td>11</td><td>1370</td><td>794</td><td>325</td><td>2489 (19x131)</td></tr>
<tr><td>12</td><td>1306</td><td>812</td><td>257</td><td>2375 (19x125)</td></tr>
<tr><td>14</td><td>585</td><td>452</td><td>160</td><td>1197 (19x63)</td></tr>
<tr><td>15</td><td>493</td><td>323</td><td>96</td><td>912 (19x48)</td></tr>
<tr class="mm-tot"><td>Total</td><td>5073</td><td>3294</td><td>1095</td><td>9462 (19x498)</td></tr>
</tbody></table></div>
<p>These initials are found in Suras 10, 11, 12, 14, and 15. The total occurrences of these letters in these suras are 2489 (19x131), 2489 (19x131), 2375 (19x125), 1197 (19x63), and 912 (19x48), respectively (Table 5).</p>

<h3>A.L.M.R. (Alef Laam Mim Ra)</h3>
<p>These initials prefix one sura, No. 13, and the total frequency of occurrence of the four letters is 1482, or 19x78. The letter &ldquo;A&rdquo; occurs 605 times, &ldquo;L&rdquo; occurs 480 times, &ldquo;M&rdquo; occurs 260 times, and &ldquo;R&rdquo; occurs 137 times.</p>

<h3>A.L.M.S. (Alef Laam Mim Saad)</h3>
<p>Only one sura is prefixed with these initials, Sura 7, and the letter &ldquo;A&rdquo; occurs in this sura 2529 times, &ldquo;L&rdquo; occurs 1530 times, &ldquo;M&rdquo; occurs 1164 times, and &ldquo;S&rdquo; (Saad) occurs 97 times. Thus, the total occurrence of the four letters in this sura is 2529+1530+1164+97 = 5320 = 19x280.</p>
<p>An important observation here is the interlocking relationship involving the letter &ldquo;S&rdquo; (Saad). This initial occurs also in Suras 19 and 38. While complementing its sister letters in Sura 7 to give a total that is divisible by 19, the frequency of this letter also complements its sister letters in Suras 19 and 38 to give a multiple of 19. (See above).</p>
<p>Additionally, the Quranic Initial &ldquo;S&rdquo; (Saad) interacts with the Quranic Initials &ldquo;K.H.Y.`A.&rdquo; (Kaaf Haa Ya `Ayn) in Sura 19 to give another total that is also a multiple of 19. (See below). This inter-locking relationship &mdash; which is not unique to the initial &ldquo;S&rdquo; (Saad) &mdash; contributes to the intricacy of the Quran&rsquo;s numerical code.</p>

<h3>K.H.Y.`A.S. (Kaaf Ha Ya `Ayn Saad)</h3>
<p>This is the longest set of initials, consisting of five letters, and it occurs in one sura, Sura 19. The letter &ldquo;K&rdquo; in Sura 19 occurs 137 times, &ldquo;H&rdquo; occurs 175 times, &ldquo;Y&rdquo; occurs 343 times, &ldquo; `A&rdquo; occurs 117 times, and &ldquo;S&rdquo; (Saad) occurs 26 times. Thus, the total occurrence of the five letters is 137+175+343+117+26 = 798 = 19x42.</p>

<h3>H., T.H. (Ta Ha), T.S. (Ta Seen) &amp; T.S.M. (Ta Seen Mim)</h3>
<p>An intricate interlocking relationship links these overlapping Quranic Initials to produce a total that is also a multiple of 19. The initial &ldquo;H.&rdquo; is found in Suras 19 and 20. The initials &ldquo;T.H.&rdquo; prefix Sura 20. The initials &ldquo;T.S.&rdquo; are found in Sura 27, while the initials &ldquo;T.S.M.&rdquo; prefix its surrounding Suras 26 &amp; 28.</p>

<div class="mm-tcap">Table 6: Occurrence of the Quranic Initials &ldquo;H.&rdquo;, &ldquo;T.H.&rdquo;, &ldquo;T.S.&rdquo; and &ldquo;T.S.M.&rdquo; in Their Suras</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura</th><th>&ldquo;H&rdquo;</th><th>&ldquo;T&rdquo;</th><th>&ldquo;S&rdquo;</th><th>&ldquo;M&rdquo;</th></tr></thead>
<tbody>
<tr><td>19</td><td>175</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>20</td><td>251</td><td>28</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>26</td><td>&nbsp;</td><td>33</td><td>94</td><td>484</td></tr>
<tr><td>27</td><td>&nbsp;</td><td>27</td><td>94</td><td>&nbsp;</td></tr>
<tr><td>28</td><td>&nbsp;</td><td>19</td><td>102</td><td>460</td></tr>
<tr class="mm-tot"><td>Total</td><td>426</td><td>107</td><td>290</td><td>944</td></tr>
</tbody></table></div>
<p>426+107+290+944 = 1767 = (19x93)</p>
<p>It should be noted at this time that the longer, more complex, interlocking and overlapping initials are found in the suras where uncommonly powerful miracles are narrated. For example, the virgin birth of Jesus is given in Sura 19, which is prefixed with the longest set of initials, K.H.Y.`A.S. The interlocking initials &ldquo;H.,&rdquo; &ldquo;T.H.,&rdquo; &ldquo;T.S.,&rdquo; and &ldquo;T.S.M.&rdquo; prefix suras describing the miracles of Moses, Jesus, and the uncommon occurrences surrounding Solomon and his jinns. God thus provides stronger evidence to support stronger miracles. The frequencies of occurrence of these initials are presented in Table 6.</p>
</div>

<div class="mm-section" id="gematrical-value">
<h2>What Is A &ldquo;Gematrical Value&rdquo;?</h2>
<p>When the Quran was revealed, 14 centuries ago, the numbers known today did not exist. A universal system was used where the letters of the Arabic, Hebrew, Aramaic, and Greek alphabets were used as numerals. The number assigned to each letter is its &ldquo;Gematrical Value.&rdquo; The numerical values of the Arabic alphabet are shown in Table 7.</p>

<div class="mm-tcap">Table 7: Gematrical (Abjad) Values of the Arabic Alphabet</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Letter</th><th>Value</th><th>&nbsp;</th><th>Letter</th><th>Value</th><th>&nbsp;</th><th>Letter</th><th>Value</th></tr></thead>
<tbody>
<tr><td>Alef ا</td><td>1</td><td>&nbsp;</td><td>Ya&rsquo; ي</td><td>10</td><td>&nbsp;</td><td>Qaf ق</td><td>100</td></tr>
<tr><td>Ba&rsquo; ب</td><td>2</td><td>&nbsp;</td><td>Kaf ك</td><td>20</td><td>&nbsp;</td><td>Ra&rsquo; ر</td><td>200</td></tr>
<tr><td>Jim ج</td><td>3</td><td>&nbsp;</td><td>Laam ل</td><td>30</td><td>&nbsp;</td><td>Shin ش</td><td>300</td></tr>
<tr><td>Dal د</td><td>4</td><td>&nbsp;</td><td>Mim م</td><td>40</td><td>&nbsp;</td><td>Ta&rsquo; ت</td><td>400</td></tr>
<tr><td>Ha&rsquo; ه</td><td>5</td><td>&nbsp;</td><td>Noon ن</td><td>50</td><td>&nbsp;</td><td>Tha&rsquo; ث</td><td>500</td></tr>
<tr><td>Waw و</td><td>6</td><td>&nbsp;</td><td>Seen س</td><td>60</td><td>&nbsp;</td><td>Kha&rsquo; خ</td><td>600</td></tr>
<tr><td>Zay ز</td><td>7</td><td>&nbsp;</td><td>&lsquo;Ayn ع</td><td>70</td><td>&nbsp;</td><td>Dhal ذ</td><td>700</td></tr>
<tr><td>Ha&rsquo; ح</td><td>8</td><td>&nbsp;</td><td>Fa&rsquo; ف</td><td>80</td><td>&nbsp;</td><td>Dad ض</td><td>800</td></tr>
<tr><td>TTa&rsquo; ط</td><td>9</td><td>&nbsp;</td><td>Saad ص</td><td>90</td><td>&nbsp;</td><td>Za ظ</td><td>900</td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Ghayn غ</td><td>1000</td></tr>
</tbody></table></div>
</div>

<div class="mm-section" id="other-properties">
<h2>Other Mathematical Properties of the Initialed Suras</h2>
<div class="mm-tcap">Table 8: The 14 Letters Used in Forming Quranic Initials</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Letter</th><th>Value</th><th>First Sura</th></tr></thead>
<tbody>
<tr><td>A (Alef)</td><td>1</td><td>2</td></tr>
<tr><td>L (Laam)</td><td>30</td><td>2</td></tr>
<tr><td>M (Mim)</td><td>40</td><td>2</td></tr>
<tr><td>S (Saad)</td><td>90</td><td>7</td></tr>
<tr><td>R (Ra)</td><td>200</td><td>10</td></tr>
<tr><td>K (Kaf)</td><td>20</td><td>19</td></tr>
<tr><td>H (Ha)</td><td>5</td><td>19</td></tr>
<tr><td>Y (Ya)</td><td>10</td><td>19</td></tr>
<tr><td>`A (`Ayn)</td><td>70</td><td>19</td></tr>
<tr><td>T (Ta)</td><td>9</td><td>20</td></tr>
<tr><td>S (Seen)</td><td>60</td><td>26</td></tr>
<tr><td>H (Ha)</td><td>8</td><td>40</td></tr>
<tr><td>Q (Qaf)</td><td>100</td><td>42</td></tr>
<tr><td>N (Noon)</td><td>50</td><td>68</td></tr>
<tr class="mm-tot"><td>Total</td><td>693</td><td>295</td></tr>
</tbody></table></div>
<p>693 + 295 = 988 = 19x52. Also 693 + 29 (suras) = 722 = 19x19x2.</p>
<p>Fourteen Arabic letters, half the Arabic alphabet, participate in the formation of 14 different sets of Quranic Initials. By adding the gematrical value of each one of these letters, plus the number of suras which are prefixed with Quranic Initials (29), we obtain a total of 722, or 19x19x2. Additionally, if we add the total gematrical value of all 14 initials, plus the number of the first sura where the initial occurs, we get a grand total of 988, 19x52. Table 8 presents these data. If we add the number of occurrences of each of the 14 letters listed in Table 8 as an initial, plus the numbers of the suras where it occurs as an initial, the Grand Total comes to 2033, 19x107. See Table 9.</p>

<div class="mm-tcap">Table 9: Mathematically Structured Distribution of the Quranic Initials</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Initial</th><th>No. of Occurrences</th><th class="mm-wrap-cell">Suras Where It Occurs</th><th>Total</th></tr></thead>
<tbody>
<tr><td>A (Alef)</td><td>13</td><td class="mm-wrap-cell">+2+3+7+10+11+12+13+14+15+29+30+31+32</td><td>222</td></tr>
<tr><td>L (Laam)</td><td>13</td><td class="mm-wrap-cell">+2+3+7+10+11+12+13+14+15+29+30+31+32</td><td>222</td></tr>
<tr><td>M (Mim)</td><td>17</td><td class="mm-wrap-cell">+2+3+7+13+26+28+29+30+31+32+40+41+42+43+44+45+46</td><td>519</td></tr>
<tr><td>S (Saad)</td><td>3</td><td class="mm-wrap-cell">+7+19+38</td><td>67</td></tr>
<tr><td>R (Ra)</td><td>6</td><td class="mm-wrap-cell">+10+11+12+13+14+15</td><td>81</td></tr>
<tr><td>K (Kaf)</td><td>1</td><td class="mm-wrap-cell">+19</td><td>20</td></tr>
<tr><td>H (Ha)</td><td>2</td><td class="mm-wrap-cell">+19+20</td><td>41</td></tr>
<tr><td>Y (Ya)</td><td>2</td><td class="mm-wrap-cell">+19+36</td><td>57</td></tr>
<tr><td>`A (`Ayn)</td><td>2</td><td class="mm-wrap-cell">+19+42</td><td>63</td></tr>
<tr><td>T (Ta)</td><td>4</td><td class="mm-wrap-cell">+20+26+27+28</td><td>105</td></tr>
<tr><td>S (Seen)</td><td>5</td><td class="mm-wrap-cell">+26+27+28+36+42</td><td>164</td></tr>
<tr><td>H (HHa)</td><td>7</td><td class="mm-wrap-cell">+40+41+42+43+44+45+46</td><td>308</td></tr>
<tr><td>Q (Qaf)</td><td>2</td><td class="mm-wrap-cell">+42+50</td><td>94</td></tr>
<tr><td>N (Noon)</td><td>2</td><td class="mm-wrap-cell">+68</td><td>70</td></tr>
<tr class="mm-tot"><td>Total</td><td>79</td><td>1954</td><td>2033 (19x107)</td></tr>
</tbody></table></div>

<div class="mm-tcap">Table 10: Total Gematrical Values of All Quranic Initials In Their Suras</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura</th><th>Initials</th><th>Frequency of Initials</th><th>Total G. Val. in Sura</th></tr></thead>
<tbody>
<tr><td>2</td><td>A.L.M.</td><td>9899</td><td>188362</td></tr>
<tr><td>3</td><td>A.L.M.</td><td>5662</td><td>109241</td></tr>
<tr><td>7</td><td>A.L.M.S.</td><td>5320</td><td>103719</td></tr>
<tr><td>10</td><td>A.L.R.</td><td>2489</td><td>80109</td></tr>
<tr><td>11</td><td>A.L.R.</td><td>2489</td><td>90190</td></tr>
<tr><td>12</td><td>A.L.R.</td><td>2375</td><td>77066</td></tr>
<tr><td>13</td><td>A.L.M.R.</td><td>1482</td><td>52805</td></tr>
<tr><td>14</td><td>A.L.R.</td><td>1197</td><td>46145</td></tr>
<tr><td>15</td><td>A.L.R.</td><td>912</td><td>29383</td></tr>
<tr><td>19</td><td>K.H.Y.`A.S.</td><td>798</td><td>17575</td></tr>
<tr><td>20</td><td>T.H.</td><td>279</td><td>1507</td></tr>
<tr><td>26</td><td>T.S.M.</td><td>611</td><td>25297</td></tr>
<tr><td>27</td><td>T.S.</td><td>121</td><td>5883</td></tr>
<tr><td>28</td><td>T.S.M.</td><td>581</td><td>24691</td></tr>
<tr><td>29</td><td>A.L.M.</td><td>1672</td><td>31154</td></tr>
<tr><td>30</td><td>A.L.M.</td><td>1254</td><td>25014</td></tr>
<tr><td>31</td><td>A.L.M.</td><td>817</td><td>16177</td></tr>
<tr><td>32</td><td>A.L.M.</td><td>570</td><td>11227</td></tr>
<tr><td>36</td><td>Y.S.</td><td>285</td><td>5250</td></tr>
<tr><td>38</td><td>S.</td><td>29</td><td>2610</td></tr>
<tr><td>40</td><td>H.M.</td><td>444</td><td>15712</td></tr>
<tr><td>41</td><td>H.M.</td><td>324</td><td>11424</td></tr>
<tr><td>42</td><td>H.M.-`A.S.Q.</td><td>562</td><td>28224</td></tr>
<tr><td>43</td><td>H.M.</td><td>368</td><td>13312</td></tr>
<tr><td>44</td><td>H.M.</td><td>166</td><td>6128</td></tr>
<tr><td>45</td><td>H.M.</td><td>231</td><td>8248</td></tr>
<tr><td>46</td><td>H.M.</td><td>261</td><td>9288</td></tr>
<tr><td>50</td><td>Q</td><td>57</td><td>5700</td></tr>
<tr><td>68</td><td>N,N</td><td>133</td><td>6650</td></tr>
<tr class="mm-tot"><td>Total</td><td>&nbsp;</td><td>41388</td><td>1048091</td></tr>
</tbody></table></div>
<p>41388 + 1048091 = 1089479 (19 x 57341)</p>
<p>Table 10 presents the total frequency of Quranic Initials, plus the total gematrical value of these letters in the whole sura. The Grand Total for all initialed suras is 1089479. This number, in excess of one million, is a multiple of 19 (1089479 = 19 x 57341). The slightest alteration or distortion destroys the system. Note: The total gematrical value of the Quranic Initials in a given sura equals the gematrical value of each initial multiplied by the frequency of occurrence of that initial in the sura.</p>
</div>

<div class="mm-section" id="major-parameters">
<h2>Major Parameters of the Quranic Initials</h2>
<p>(Suras, Verses, Frequency, First Sura, &amp; Last Sura)</p>
<p>Table 11 shows that the sum of numbers of suras and verses where the Quranic Initials are found, plus the initial&rsquo;s frequency of occurrence in that sura, plus the number of the first sura where the initials occur, plus the number of the last sura where the initials occur, produces a total that equals 44232, or 19x2348. Thus, the distribution of the Quranic Initials in the initialed suras is so intricate that their counts and their placement within suras are intertwined to give a grand total that is a multiple of 19.</p>
<p>It is noteworthy that the initial &ldquo;N&rdquo; must be counted as two N&rsquo;s. This reflects the fact that the original Quranic text spells out this initial with 2 N&rsquo;s.</p>

<div class="mm-tcap">Table 11: Parameters of the 14 Individual Quranic Initials</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Initial</th><th class="mm-wrap-cell">Sura, Verse, &amp; (Frequency) of Initial in Each Sura</th><th>First Sura</th><th>Last Sura</th></tr></thead>
<tbody>
<tr><td>A (Alef)</td><td class="mm-wrap-cell">2:1 (4502), 3:1 (2521), 7:1 (2529), 10:1 (1319), 11:1 (1370), 12:1 (1306), 13:1 (605), 14:1 (585), 15:1 (493), 29:1 (774), 30:1 (544), 31:1 (347), 32:1 (257)</td><td>2</td><td>32</td></tr>
<tr><td>L (Laam)</td><td class="mm-wrap-cell">2:1 (3202), 3:1 (1892), 7:1 (1530), 10:1 (913), 11:1 (794), 12:1 (812), 13:1 (480), 14:1 (452), 15:1 (323), 29:1 (554), 30:1 (393), 31:1 (297), 32:1 (155)</td><td>2</td><td>32</td></tr>
<tr><td>M (Mim)</td><td class="mm-wrap-cell">2:1 (2195), 3:1 (1249), 7:1 (1164), 13:1 (260), 26:1 (484), 28:1 (460), 29:1 (344), 30:1 (317), 31:1 (173), 32:1 (158), 40:1 (380), 41:1 (276), 42:1 (300), 43:1 (324), 44:1 (150), 45:1 (200), 46:1 (225)</td><td>2</td><td>46</td></tr>
<tr><td>S (Saad)</td><td class="mm-wrap-cell">7:1 (97), 19:1 (26), 38:1 (29)</td><td>7</td><td>38</td></tr>
<tr><td>R (Ra)</td><td class="mm-wrap-cell">10:1 (257), 11:1 (325), 12:1 (257), 13:1 (137), 14:1 (160), 15:1 (96)</td><td>10</td><td>15</td></tr>
<tr><td>K (Kaf)</td><td class="mm-wrap-cell">19:1 (137)</td><td>19</td><td>19</td></tr>
<tr><td>H (Ha)</td><td class="mm-wrap-cell">19:1 (175), 20:1 (251)</td><td>19</td><td>20</td></tr>
<tr><td>Y (Ya)</td><td class="mm-wrap-cell">19:1 (343), 36:1 (237)</td><td>19</td><td>36</td></tr>
<tr><td>`A (`Ayn)</td><td class="mm-wrap-cell">19:1 (117), 42:2 (98)</td><td>19</td><td>42</td></tr>
<tr><td>T (Ta)</td><td class="mm-wrap-cell">20:1 (28), 26:1 (33), 27:1 (27), 28:1 (19)</td><td>20</td><td>28</td></tr>
<tr><td>S (Seen)</td><td class="mm-wrap-cell">26:1 (94), 27:1 (94), 28:1 (102), 36:1 (48), 42:2 (54)</td><td>26</td><td>42</td></tr>
<tr><td>H (HHa)</td><td class="mm-wrap-cell">40:1 (64), 41:1 (48), 42:1 (53), 43:1 (44), 44:1 (16), 45:1 (31), 46:1 (36)</td><td>40</td><td>46</td></tr>
<tr><td>Q (Qaf)</td><td class="mm-wrap-cell">42:2 (57), 50:1 (57)</td><td>42</td><td>50</td></tr>
<tr><td>N (NuN)</td><td class="mm-wrap-cell">68:1 (133)</td><td>68</td><td>68</td></tr>
<tr class="mm-tot"><td>Total</td><td>43423</td><td>295</td><td>514</td></tr>
</tbody></table></div>
<p>Grand Total = 43423+295+514 = 44232 = 19x2328</p>
<p>A special mathematical coding authenticates the number of verses where the Quranic Initials themselves are found. As detailed in Table 11, all Quranic Initials occur in Verse 1, except in Sura 42 (initials in Verses 1 and 2). This fact is supported by the remarkable mathematical phenomenon detailed in Table 12. If we multiply the first two columns of Table 12, instead of adding, we still end up with a Total that is divisible by 19 (see Table 13).</p>

<div class="mm-tcap">Table 12: Mathematical Coding of the Number of Verses with Initials</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura No.</th><th>No. of Initials</th><th>Initialed Verses</th></tr></thead>
<tbody>
<tr><td>2</td><td>3</td><td>1</td></tr>
<tr><td>3</td><td>3</td><td>1</td></tr>
<tr><td>7</td><td>4</td><td>1</td></tr>
<tr><td>10</td><td>3</td><td>1</td></tr>
<tr><td>11</td><td>3</td><td>1</td></tr>
<tr><td>12</td><td>3</td><td>1</td></tr>
<tr><td>13</td><td>4</td><td>1</td></tr>
<tr><td>14</td><td>3</td><td>1</td></tr>
<tr><td>15</td><td>3</td><td>1</td></tr>
<tr><td>19</td><td>5</td><td>1</td></tr>
<tr><td>20</td><td>2</td><td>1</td></tr>
<tr><td>26</td><td>3</td><td>1</td></tr>
<tr><td>27</td><td>2</td><td>1</td></tr>
<tr><td>28</td><td>3</td><td>1</td></tr>
<tr><td>29</td><td>3</td><td>1</td></tr>
<tr><td>30</td><td>3</td><td>1</td></tr>
<tr><td>31</td><td>3</td><td>1</td></tr>
<tr><td>32</td><td>3</td><td>1</td></tr>
<tr><td>36</td><td>2</td><td>1</td></tr>
<tr><td>38</td><td>1</td><td>1</td></tr>
<tr><td>40</td><td>2</td><td>1</td></tr>
<tr><td>41</td><td>2</td><td>1</td></tr>
<tr><td>42</td><td>5</td><td>2</td></tr>
<tr><td>43</td><td>2</td><td>1</td></tr>
<tr><td>44</td><td>2</td><td>1</td></tr>
<tr><td>45</td><td>2</td><td>1</td></tr>
<tr><td>46</td><td>2</td><td>1</td></tr>
<tr><td>50</td><td>1</td><td>1</td></tr>
<tr><td>68</td><td>2</td><td>1</td></tr>
<tr class="mm-tot"><td>Total</td><td>822</td><td>79</td></tr>
</tbody></table></div>
<p>822 + 79 + 30 = 931 (19x49)</p>
<p>Obviously, it is crucial to have two different initialed verses in Sura 42 in order to conform with the Quran&rsquo;s mathematical code. The fact that Verse 1 of Sura 42 consists of the two Quranic Initials &ldquo;H.M.&rdquo; and the second verse consists of the three Initials &ldquo; `A.S.Q.&rdquo; has perplexed Muslim scholars and orientalists for 14 centuries. By the end of this Appendix, the reader will see that every element of the Quran is mathematically authenticated. The elements we are dealing with now are &ldquo;the number of Quranic Initials in each initialed sura&rdquo; and &ldquo;the number of verses that contain Quranic Initials.&rdquo; Tables 11 through 13 have dealt with these two elements. Additional mathematical authentication is shown in Tables 14 and 15. In Table 14, we have the numbers of all initialed suras added to the number of verses in each sura, plus the number of verses containing initials, plus the gematrical values of those initials. The Grand Total is 7030, or 19x370.</p>

<div class="mm-tcap">Table 13: Multiplying the First Two Columns of Table 12, Instead of Adding</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura No.</th><th>&nbsp;</th><th>No. of Initials</th><th>No. of Init&rsquo;ld Verses</th></tr></thead>
<tbody>
<tr><td>2</td><td>X</td><td>3</td><td>1</td></tr>
<tr><td>3</td><td>X</td><td>3</td><td>1</td></tr>
<tr><td>7</td><td>X</td><td>4</td><td>1</td></tr>
<tr><td>&hellip;</td><td>&nbsp;</td><td>&hellip;</td><td>&hellip;</td></tr>
<tr><td>42</td><td>X</td><td>5</td><td>2</td></tr>
<tr><td>&hellip;</td><td>&nbsp;</td><td>&hellip;</td><td>&hellip;</td></tr>
<tr><td>50</td><td>X</td><td>1</td><td>1</td></tr>
<tr><td>68</td><td>X</td><td>2</td><td>1</td></tr>
</tbody></table></div>

<div class="mm-tcap">Table 14: Mathematical Properties of the Initialed Suras</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura Number</th><th>Number of Verses</th><th>Number of Initialed Verses</th><th>Gematrical Value of the Initials</th><th>Total</th></tr></thead>
<tbody>
<tr><td>2</td><td>286</td><td>1</td><td>71</td><td>360</td></tr>
<tr><td>3</td><td>200</td><td>1</td><td>71</td><td>275</td></tr>
<tr><td>7</td><td>206</td><td>1</td><td>161</td><td>375</td></tr>
<tr><td>10</td><td>109</td><td>1</td><td>231</td><td>351</td></tr>
<tr><td>11</td><td>123</td><td>1</td><td>231</td><td>366</td></tr>
<tr><td>12</td><td>111</td><td>1</td><td>231</td><td>355</td></tr>
<tr><td>13</td><td>43</td><td>1</td><td>271</td><td>328</td></tr>
<tr><td>14</td><td>52</td><td>1</td><td>231</td><td>298</td></tr>
<tr><td>15</td><td>99</td><td>1</td><td>231</td><td>346</td></tr>
<tr><td>19</td><td>98</td><td>1</td><td>195</td><td>313</td></tr>
<tr><td>20</td><td>135</td><td>1</td><td>14</td><td>170</td></tr>
<tr><td>26</td><td>227</td><td>1</td><td>109</td><td>363</td></tr>
<tr><td>27</td><td>93</td><td>1</td><td>69</td><td>190</td></tr>
<tr><td>28</td><td>88</td><td>1</td><td>109</td><td>226</td></tr>
<tr><td>29</td><td>69</td><td>1</td><td>71</td><td>170</td></tr>
<tr><td>30</td><td>60</td><td>1</td><td>71</td><td>162</td></tr>
<tr><td>31</td><td>34</td><td>1</td><td>71</td><td>137</td></tr>
<tr><td>32</td><td>30</td><td>1</td><td>71</td><td>134</td></tr>
<tr><td>36</td><td>83</td><td>1</td><td>70</td><td>190</td></tr>
<tr><td>38</td><td>88</td><td>1</td><td>90</td><td>217</td></tr>
<tr><td>40</td><td>85</td><td>1</td><td>48</td><td>174</td></tr>
<tr><td>41</td><td>54</td><td>1</td><td>48</td><td>144</td></tr>
<tr><td>42</td><td>53</td><td>2</td><td>278</td><td>375</td></tr>
<tr><td>43</td><td>89</td><td>1</td><td>48</td><td>181</td></tr>
<tr><td>44</td><td>59</td><td>1</td><td>48</td><td>152</td></tr>
<tr><td>45</td><td>37</td><td>1</td><td>48</td><td>131</td></tr>
<tr><td>46</td><td>35</td><td>1</td><td>48</td><td>130</td></tr>
<tr><td>50</td><td>45</td><td>1</td><td>100</td><td>196</td></tr>
<tr><td>68</td><td>52</td><td>1</td><td>50+50</td><td>221</td></tr>
<tr class="mm-tot"><td>Total</td><td>822</td><td>2743</td><td>30</td><td>3435</td></tr>
</tbody></table></div>
<p>822+2743+30+3435 = 7030</p>
<p>Remarkably, if we multiply the first two columns of Table 14, instead of adding them, we still get a Grand Total that is divisible by 19 (Table 15).</p>

<div class="mm-tcap">Table 15: Multiplying the First 2 Columns of Table 14, Instead of Adding Them</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura Number</th><th>&nbsp;</th><th>Number of Verses</th><th>+</th><th>Number of Initi&rsquo;ld Verses</th><th>+</th><th>Gematrical Value of the Initials</th><th>=</th></tr></thead>
<tbody>
<tr><td>2</td><td>X</td><td>286</td><td>+</td><td>1</td><td>+</td><td>71</td><td>=</td></tr>
<tr><td>3</td><td>X</td><td>200</td><td>+</td><td>1</td><td>+</td><td>71</td><td>=</td></tr>
<tr><td>7</td><td>X</td><td>206</td><td>+</td><td>1</td><td>+</td><td>161</td><td>=</td></tr>
<tr><td>&hellip;</td><td>&nbsp;</td><td>&hellip;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>=</td></tr>
<tr><td>50</td><td>X</td><td>45</td><td>+</td><td>1</td><td>+</td><td>100</td><td>=</td></tr>
<tr><td>68</td><td>X</td><td>52</td><td>+</td><td>1</td><td>+</td><td>(50+50)</td><td>=</td></tr>
<tr class="mm-tot"><td>Total</td><td>&nbsp;</td><td>60071</td><td>+</td><td>30</td><td>+</td><td>3435</td><td>=63536 (19x3344)</td></tr>
</tbody></table></div>
<p>The number of verses per sura, and the numbers assigned to each verse are among the basic elements of the Quran. Not only are these elements authenticated mathematically, but both initialed and un-initialed suras are independently coded. Since we are now dealing with the initialed suras, Table 16 presents the numbers assigned to these suras, added to the numbers of verses in each sura, plus the sum of verse numbers (1+2+3+&hellip;+n). The Grand total is 190133, or 19x10007.</p>

<div class="mm-tcap">Table 16: Mathematical Structuring of the Verses of Initialed Suras</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura No.</th><th>No. of Verses</th><th>Sum of Verse #s</th><th>Total</th></tr></thead>
<tbody>
<tr><td>2</td><td>286</td><td>41041</td><td>41329</td></tr>
<tr><td>3</td><td>200</td><td>20100</td><td>20303</td></tr>
<tr><td>7</td><td>206</td><td>21321</td><td>21534</td></tr>
<tr><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td></tr>
<tr><td>50</td><td>45</td><td>1035</td><td>1130</td></tr>
<tr><td>68</td><td>52</td><td>1378</td><td>1498</td></tr>
<tr class="mm-tot"><td>Total</td><td>822</td><td>2743</td><td>186568</td></tr>
</tbody></table></div>
<p>190133 (19x10007)</p>
<p>By adding the number of every sura to the number of the next sura, and accumulating the sums of sura numbers as we continue this process to the end of the Quran, we will have a value that corresponds to each sura. Thus, Sura 1 will have a corresponding value of 1, Sura 2 will have a value of 1+2=3, Sura 3 will have a value of 3+3=6, Sura 4 will have a value of 6+4=10, and so on to the end of the Quran. The total values for the initialed and the un-initialed suras are independently divisible by 19. The values for the initialed suras are shown in Table 17. The values calculated for the un-initialed suras add up to a total of 237785, which is also a multiple of 19 (237785 = 19x12515).</p>

<div class="mm-tcap">Table 17: Values Obtained by Successive Addition of Sura Numbers</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura Number</th><th>Calculated Value</th></tr></thead>
<tbody>
<tr><td>2</td><td>3</td></tr>
<tr><td>3</td><td>6</td></tr>
<tr><td>7</td><td>28</td></tr>
<tr><td>10</td><td>55</td></tr>
<tr><td>11</td><td>66</td></tr>
<tr><td>12</td><td>78</td></tr>
<tr><td>13</td><td>91</td></tr>
<tr><td>14</td><td>105</td></tr>
<tr><td>15</td><td>120</td></tr>
<tr><td>19</td><td>190</td></tr>
<tr><td>20</td><td>210</td></tr>
<tr><td>&hellip;</td><td>&hellip;</td></tr>
<tr><td>44</td><td>990</td></tr>
<tr><td>45</td><td>1035</td></tr>
<tr><td>46</td><td>1081</td></tr>
<tr><td>50</td><td>1275</td></tr>
<tr><td>68</td><td>2346</td></tr>
<tr class="mm-tot"><td>Total</td><td>15675 (19x825)</td></tr>
</tbody></table></div>
</div>

<div class="mm-section" id="special-words">
<h2>Mathematical Coding of Special Words</h2>
<h3>The Word &ldquo;God&rdquo; (Allah)</h3>
<p>[1] As shown earlier the word &ldquo;God&rdquo; occurs in the Quran 2698 times, 19x142.</p>
<p>[2] The numbers of verses where the word &ldquo;God&rdquo; occurs add up to 118123, also a multiple of 19 (118123 = 19x6217).</p>

<div class="mm-tcap">Table 18: Occurrence of the Word &ldquo;God&rdquo; outside the Initialed Section</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>No. of Sura</th><th class="mm-wrap-cell">No. of Verses</th><th>Times Occurs</th></tr></thead>
<tbody>
<tr><td>1</td><td class="mm-wrap-cell">1, 2</td><td>2</td></tr>
<tr><td>69</td><td class="mm-wrap-cell">33</td><td>1</td></tr>
<tr><td>70</td><td class="mm-wrap-cell">3</td><td>1</td></tr>
<tr><td>71</td><td class="mm-wrap-cell">3, 4, 13, 15, 17, 19, 25</td><td>7</td></tr>
<tr><td>72</td><td class="mm-wrap-cell">4, 5, 7, 12, 18, 19, 22, 23</td><td>10</td></tr>
<tr><td>73</td><td class="mm-wrap-cell">20</td><td>7</td></tr>
<tr><td>74</td><td class="mm-wrap-cell">31, 56</td><td>3</td></tr>
<tr><td>76</td><td class="mm-wrap-cell">6, 9, 11, 30</td><td>5</td></tr>
<tr><td>79</td><td class="mm-wrap-cell">25</td><td>1</td></tr>
<tr><td>81</td><td class="mm-wrap-cell">29</td><td>1</td></tr>
<tr><td>82</td><td class="mm-wrap-cell">19</td><td>1</td></tr>
<tr><td>84</td><td class="mm-wrap-cell">23</td><td>1</td></tr>
<tr><td>85</td><td class="mm-wrap-cell">8, 9, 20</td><td>3</td></tr>
<tr><td>87</td><td class="mm-wrap-cell">7</td><td>1</td></tr>
<tr><td>88</td><td class="mm-wrap-cell">24</td><td>1</td></tr>
<tr><td>91</td><td class="mm-wrap-cell">13</td><td>2</td></tr>
<tr><td>95</td><td class="mm-wrap-cell">8</td><td>1</td></tr>
<tr><td>96</td><td class="mm-wrap-cell">14</td><td>1</td></tr>
<tr><td>98</td><td class="mm-wrap-cell">2, 5, 8</td><td>3</td></tr>
<tr><td>104</td><td class="mm-wrap-cell">6</td><td>1</td></tr>
<tr><td>110</td><td class="mm-wrap-cell">1, 2</td><td>2</td></tr>
<tr><td>112</td><td class="mm-wrap-cell">1, 2</td><td>2</td></tr>
<tr class="mm-tot"><td>Total</td><td>1798</td><td>634</td></tr>
</tbody></table></div>
<p>Sum of numbers of the suras &amp; verses = 1798 + 634 = 2432 = 19 x 128. Total occurrence of the word &ldquo;God&rdquo; outside the initialed section = 57 (19 x 3).</p>
<p>These simple phenomena gave us many difficulties while simply counting the word &ldquo;God.&rdquo; We were a group of workers, equipped with computers, and all of us college graduates. Yet, we made several errors in counting, calculating, or simply writing the counts of the word &ldquo;God.&rdquo; Those who still claim that Muhammad was the author of the Quran are totally illogical; he never went to college, and he did not have a computer.</p>
<p>[3] From the first Quranic Initials (A.L.M. 2:1) to the last initial (N. 68:1), there are 2641, 19x139, occurrences of the word &ldquo;God.&rdquo;</p>
<p>[4] The word &ldquo;God&rdquo; occurs 57 times in the section outside the initials (Table 18).</p>
<p>[5] By adding the numbers of the suras and verses where these 57 occurrences of the word &ldquo;God&rdquo; are found, we get a total of 2432, or 19x128. See Table 18.</p>
<p>[6] The word &ldquo;God&rdquo; occurs in 85 suras. If we add the number of each sura to the number of verses between the first and last occurrences of the word &ldquo;God,&rdquo; both verses inclusive, the Grand Total comes to 8170 or 19x430. An abbreviated representation of the data is shown in Table 19.</p>
<p>[7] The Quran&rsquo;s dominant message is that there is only &ldquo;One God.&rdquo; The word &ldquo;One,&rdquo; in Arabic &ldquo;Wahed&rdquo; occurs in the Quran 25 times. Six of these occurrences refer to other than God (one kind of food, one door, etc.). The other 19 occurrences refer to God. These data are found in the classic reference INDEX TO THE WORDS OF QURAN.</p>

<div class="mm-tcap">Table 19: All Suras in Which the Word &ldquo;God&rdquo; (Allah) Is Mentioned</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura No.</th><th>First Verse</th><th>Last Verse</th><th>Verses 1st to Last</th></tr></thead>
<tbody>
<tr><td>1</td><td>1</td><td>1</td><td>2</td></tr>
<tr><td>2</td><td>2</td><td>7</td><td>286</td></tr>
<tr><td>3</td><td>3</td><td>2</td><td>200</td></tr>
<tr><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td></tr>
<tr><td>84</td><td>110</td><td>1</td><td>2</td></tr>
<tr><td>85</td><td>112</td><td>1</td><td>2</td></tr>
<tr class="mm-tot"><td>Total</td><td>3910</td><td>&nbsp;</td><td>4260</td></tr>
</tbody></table></div>
<p>3910+4260=8170 = 19x430</p>
<p>The crucial importance of the word &ldquo;ONE&rdquo; as the Quran&rsquo;s basic message is manifested in the fact that the Quran&rsquo;s common denominator, 19, happens to be the gematrical value of the word &ldquo;ONE.&rdquo;</p>
</div>

<span class="mm-part-tag" id="part2">Part 2</span>
<div class="mm-quote">[Quran 74:35] &ldquo;One of the Great Miracles&rdquo;</div>

<div class="mm-section" id="why-19">
<h2>Why 19!</h2>
<p>As pointed out later in this Appendix, all God&rsquo;s scriptures, not only the Quran, were mathematically coded with the number &ldquo;19.&rdquo; Even the universe at large bears this divine mark. The number 19 can be looked upon as the Almighty Creator&rsquo;s signature on everything He created (see Appendix 38). The number &ldquo;19&rdquo; possesses unique mathematical properties beyond the scope of this Appendix. For example:</p>
<ol class="mm-facts" style="counter-reset:none">
<li>It is a prime number.</li>
<li>It encompasses the first numeral (1) and the last numeral (9), as if to proclaim God&rsquo;s attribute in 57:3 as the &ldquo;Alpha and the Omega.&rdquo;</li>
<li>It looks the same in all languages of the world. Both components, 1 and 9, are the only numerals that look the same in all languages.</li>
</ol>

<div class="mm-quote">The Lord our God is ONE! Therefore, you shall worship the Lord your God with all your heart, with all your soul, with all your mind, and with all your strength.<cite>Deuteronomy 6:4-5 &middot; Mark 12:29 &middot; Quran 2:163, 17:22-23</cite></div>

<div class="mm-tcap">Table 20: Why &ldquo;19!&rdquo;</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th colspan="2">Hebrew</th><th colspan="2">Arabic</th><th>Value</th></tr></thead>
<tbody>
<tr><td colspan="2">V</td><td colspan="2">W</td><td>6</td></tr>
<tr><td colspan="2">A</td><td colspan="2">A</td><td>1</td></tr>
<tr><td colspan="2">H</td><td colspan="2">H</td><td>8</td></tr>
<tr><td colspan="2">D</td><td colspan="2">D</td><td>4</td></tr>
<tr class="mm-tot"><td colspan="4">Total</td><td>19</td></tr>
</tbody></table></div>

<p>[4] It possesses many peculiar mathematical properties. For example, 19 is the sum of the first powers of 9 and 10, and the difference between the second powers of 9 and 10. We now understand that the universal coding of God&rsquo;s creations with the number 19 rests in the fact that it is the gematrical value of the word &ldquo;ONE&rdquo; in all the scriptural languages &mdash; Aramaic, Hebrew, and Arabic.</p>
<p>The number 19, therefore, proclaims the First Commandment in all the scriptures: that there is only ONE God.</p>
<p>As shown in Table 7, the Aramaic, Hebrew, and Arabic alphabets used to double as numerals in accordance with a universally established system. The Hebrew word for &ldquo;ONE&rdquo; is &ldquo;VAHD&rdquo; (pronounced V-AHAD). In Arabic, the word for &ldquo;ONE&rdquo; is &ldquo;WAHD&rdquo; (pronounced WAAHED). See Table 20.</p>

<div class="mm-callout"><span class="lbl">Submission.org: Editorial update to this section</span>
<p>The number 19 is unique in possessing the following collective mathematical properties, for example:</p>
<ol class="mm-facts" style="counter-reset:none">
<li>It is a prime number, devisable only by itself and one.</li>
<li>It encompasses the first numeral (1) and the last numeral (9), as if to proclaim God&rsquo;s attribute in 57:3 as the &ldquo;Alpha and the Omega&rdquo;.</li>
<li>Its numerals look the same in all languages in the world. The numerals (1) and (9) look very much the same in, for example Arabic and English.</li>
<li>19 is the sum of the first powers of 9 and 10, and the difference between the second powers of 10 and 9.</li>
<li>Number 19 is the numerical value of the word &ldquo;ONE&rdquo; in all the scriptural languages, Aramaic, Hebrew, and Arabic. The number 19, therefore proclaims the First commandment in all the scriptures: that there is only ONE GOD.</li>
</ol></div>
<div class="mm-callout"><span class="lbl">Quran Inspector / Mod19</span><p>A computer program to help divide very long numbers and count Quranic initials.</p></div>
</div>

<div class="mm-section" id="word-quran">
<h2>The Word &ldquo;Quran&rdquo;</h2>
<div class="mm-tcap">Table 21: Suras and Verses Where &ldquo;Quran&rdquo; Occurs</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura</th><th>Verse</th><th>&nbsp;</th><th>Sura</th><th>Verse</th></tr></thead>
<tbody>
<tr><td>2</td><td>185</td><td>&nbsp;</td><td>30</td><td>58</td></tr>
<tr><td>4</td><td>82</td><td>&nbsp;</td><td>34</td><td>31</td></tr>
<tr><td>5</td><td>101</td><td>&nbsp;</td><td>36</td><td>2</td></tr>
<tr><td>6</td><td>19</td><td>&nbsp;</td><td>&mdash;</td><td>69</td></tr>
<tr><td>7</td><td>204</td><td>&nbsp;</td><td>38</td><td>1</td></tr>
<tr><td>9</td><td>111</td><td>&nbsp;</td><td>39</td><td>27</td></tr>
<tr><td>10</td><td>37</td><td>&nbsp;</td><td>&mdash;</td><td>28</td></tr>
<tr><td>&mdash;</td><td>61</td><td>&nbsp;</td><td>41</td><td>3</td></tr>
<tr><td>12</td><td>2</td><td>&nbsp;</td><td>&mdash;</td><td>26</td></tr>
<tr><td>&mdash;</td><td>3</td><td>&nbsp;</td><td>42</td><td>7</td></tr>
<tr><td>15</td><td>1</td><td>&nbsp;</td><td>43</td><td>3</td></tr>
<tr><td>&mdash;</td><td>87</td><td>&nbsp;</td><td>&mdash;</td><td>31</td></tr>
<tr><td>&mdash;</td><td>91</td><td>&nbsp;</td><td>46</td><td>29</td></tr>
<tr><td>16</td><td>98</td><td>&nbsp;</td><td>47</td><td>24</td></tr>
<tr><td>17</td><td>9</td><td>&nbsp;</td><td>50</td><td>1</td></tr>
<tr><td>&mdash;</td><td>41</td><td>&nbsp;</td><td>&mdash;</td><td>45</td></tr>
<tr><td>&mdash;</td><td>45</td><td>&nbsp;</td><td>54</td><td>17</td></tr>
<tr><td>&mdash;</td><td>46</td><td>&nbsp;</td><td>&mdash;</td><td>22</td></tr>
<tr><td>&mdash;</td><td>60</td><td>&nbsp;</td><td>&mdash;</td><td>32</td></tr>
<tr><td>&mdash;</td><td>78</td><td>&nbsp;</td><td>&mdash;</td><td>40</td></tr>
<tr><td>&mdash;</td><td>82</td><td>&nbsp;</td><td>55</td><td>2</td></tr>
<tr><td>&mdash;</td><td>88</td><td>&nbsp;</td><td>56</td><td>77</td></tr>
<tr><td>&mdash;</td><td>89</td><td>&nbsp;</td><td>59</td><td>21</td></tr>
<tr><td>&mdash;</td><td>106</td><td>&nbsp;</td><td>72</td><td>1</td></tr>
<tr><td>18</td><td>54</td><td>&nbsp;</td><td>73</td><td>4</td></tr>
<tr><td>20</td><td>2</td><td>&nbsp;</td><td>&mdash;</td><td>20</td></tr>
<tr><td>&mdash;</td><td>113</td><td>&nbsp;</td><td>75</td><td>17</td></tr>
<tr><td>&mdash;</td><td>114</td><td>&nbsp;</td><td>&mdash;</td><td>18</td></tr>
<tr><td>25</td><td>30</td><td>&nbsp;</td><td>76</td><td>23</td></tr>
<tr><td>&mdash;</td><td>32</td><td>&nbsp;</td><td>84</td><td>21</td></tr>
<tr><td>27</td><td>1</td><td>&nbsp;</td><td>85</td><td>21</td></tr>
<tr><td>&mdash;</td><td>6</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&mdash;</td><td>76</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&mdash;</td><td>92</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>28</td><td>85</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr class="mm-tot"><td>Total</td><td>1356</td><td>&nbsp;</td><td>&nbsp;</td><td>3052</td></tr>
</tbody></table></div>
<p>1356+3052 = 4408 (19x232)</p>
<p>The word &ldquo;Quran&rdquo; occurs in the Quran 58 times, with one of them, in 10:15, referring to &ldquo;another Quran.&rdquo; This particular occurrence, therefore, must be excluded. Thus, the frequency of occurrence of &ldquo;this Quran&rdquo; in the Quran is 57, or 19x3. Two other grammatical forms of the word &ldquo;Quran&rdquo; occur in 12 verses. These include the word &ldquo;Quranun&rdquo; and the word &ldquo;Quranahu.&rdquo; One of these occurrences, in 13:31 refers to &ldquo;another Quran&rdquo; that cause the mountains to crumble. Another occurrence, in 41:44, refers to &ldquo;a non-Arabic Quran.&rdquo; These two occurrences, therefore, are excluded. Table 21 shows a list of the suras and verses where the word &ldquo;Quran,&rdquo; in all its grammatical forms, occurs.</p>
</div>

<div class="mm-section" id="strong-foundation">
<h2>A Strong Foundation</h2>
<p>The Quran&rsquo;s first verse, &ldquo;In the Name of God, Most Gracious, Most Merciful,&rdquo; known as Basmalah, consists of 19 Arabic letters. Its constituent words occur in the Quran consistently in multiples of 19.</p>
<div class="mm-table-wrap"><table class="mm-table">
<tbody>
<tr><td>The first word</td><td>&ldquo;Ism&rdquo; (Name)</td><td>occurs 19 times.</td></tr>
<tr><td>The second word</td><td>&ldquo;Allah&rdquo; (God)</td><td>occurs 2698 times (19x142)</td></tr>
<tr><td>The third word</td><td>&ldquo;Al-Rahman&rdquo; (Most Gracious)</td><td>57 times (19x3)</td></tr>
<tr><td>The fourth word</td><td>&ldquo;Al-Raheem&rdquo; (Most Merciful)</td><td>114 times (19x6)</td></tr>
</tbody></table></div>
<p>Professor Cesar Majul looked at the gematrical value of more than 400 attributes of God, and found only four names whose gematrical values are multiples of 19:</p>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Divine Name</th><th>Gematrical Value</th></tr></thead>
<tbody>
<tr><td>1. &ldquo;Waahed&rdquo; (One)</td><td>19</td></tr>
<tr><td>2. &ldquo;Zul Fadl Al-`Azim&rdquo; (Possessor of Infinite Grace)</td><td>2698</td></tr>
<tr><td>3. &ldquo;Majid&rdquo; (Glorious)</td><td>57</td></tr>
<tr><td>4. &ldquo;Jaami`&rdquo; (Summoner)</td><td>114</td></tr>
</tbody></table></div>
<p>As noted above, the only Divine Names whose gematrical values are divisible by 19 correspond exactly to the frequencies of occurrence of the BASMALAH&rsquo;s four words. The figure below illustrates this remarkable phenomenon:</p>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Basmalah word</th><th>Frequency / Gematrical Value</th><th>Divine Name</th></tr></thead>
<tbody>
<tr><td>Name (Ism)</td><td>19</td><td>(Waahed) One</td></tr>
<tr><td>God (Allah)</td><td>2698</td><td>(Zul Fadl Al-`Azim) Possessor of Infinite Grace</td></tr>
<tr><td>Most Gracious (Al-Rahman)</td><td>57</td><td>(Majid) Glorious</td></tr>
<tr><td>Most Merciful (Al-Raheem)</td><td>114</td><td>(Jaami`) Gatherer</td></tr>
</tbody></table></div>
<p>The four words of Basmalah are shown on the left side, and the only four divine names whose gematrical values are divisible by 19 are on the right side. The numbers in the middle are the frequencies of occurrence of the words of Basmalah, and, at the same time, the gematrical values of the four divine names.</p>
</div>

<div class="mm-section" id="five-pillars">
<h2>The Five Pillars of Islam</h2>
<p>Although the Quran provides numerous important commandments governing all aspects of our lives (see for example 17:22-38), five basic &ldquo;pillars&rdquo; have been traditionally emphasized. They are:</p>
<ol class="mm-facts" style="counter-reset:none">
<li><b>Shahaadah:</b>&nbsp;Bearing witness that there is no other god besides God.</li>
<li><b>Salat:</b>&nbsp;Observing five daily Contact Prayers.</li>
<li><b>Seyaam:</b>&nbsp;Fasting during the ninth month of the Islamic calendar (Ramadan).</li>
<li><b>Zakat:</b>&nbsp;Giving away 2.5% of one&rsquo;s net income as a charity to specified people.</li>
<li><b>Hajj:</b>&nbsp;Pilgrimage to Mecca once in a lifetime for those who can afford it.</li>
</ol>
<p>Like everything else in the Quran, these are mathematically structured.</p>

<div class="mm-tcap">Table 22: All Suras and Verses from First Occurrence of LAA ELAAHA ELLA HOO to the Last Occurrence</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura No.</th><th>No. of Verses</th><th>Sum of Verse #s</th><th>Total</th></tr></thead>
<tbody>
<tr><td>2</td><td>123</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>3</td><td>200</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td></tr>
<tr><td>9</td><td>127</td><td>8128</td><td>8264</td></tr>
<tr><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td></tr>
<tr><td>72</td><td>28</td><td>406</td><td>506</td></tr>
<tr><td>73</td><td>9</td><td>45</td><td>127</td></tr>
<tr class="mm-tot"><td>Total</td><td>2700</td><td>5312</td><td>308490</td></tr>
</tbody></table></div>
<p>316502 (19x16658)</p>

<div class="mm-tcap">Table 23: List of All Occurrences of the Crucial Phrase &ldquo;LAA ELAAHA ELLA HOO&rdquo; (There is no other god besides Him)</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>No.</th><th>Sura No.</th><th class="mm-wrap-cell">Verses with Shahadah</th><th>Frequency of Shahadah</th></tr></thead>
<tbody>
<tr><td>1.</td><td>2</td><td class="mm-wrap-cell">163, 255</td><td>2</td></tr>
<tr><td>2.</td><td>3</td><td class="mm-wrap-cell">2, 6, 18 (twice)</td><td>4</td></tr>
<tr><td>3.</td><td>4</td><td class="mm-wrap-cell">87</td><td>1</td></tr>
<tr><td>4.</td><td>6</td><td class="mm-wrap-cell">102, 106</td><td>2</td></tr>
<tr><td>5.</td><td>7</td><td class="mm-wrap-cell">158</td><td>1</td></tr>
<tr><td>6.</td><td>9</td><td class="mm-wrap-cell">31</td><td>1</td></tr>
<tr><td>7.</td><td>11</td><td class="mm-wrap-cell">14</td><td>1</td></tr>
<tr><td>8.</td><td>13</td><td class="mm-wrap-cell">30</td><td>1</td></tr>
<tr><td>9.</td><td>20</td><td class="mm-wrap-cell">8, 98</td><td>2</td></tr>
<tr><td>10.</td><td>23</td><td class="mm-wrap-cell">116</td><td>1</td></tr>
<tr><td>11.</td><td>27</td><td class="mm-wrap-cell">26</td><td>1</td></tr>
<tr><td>12.</td><td>28</td><td class="mm-wrap-cell">70, 88</td><td>2</td></tr>
<tr><td>13.</td><td>35</td><td class="mm-wrap-cell">3</td><td>1</td></tr>
<tr><td>14.</td><td>39</td><td class="mm-wrap-cell">6</td><td>1</td></tr>
<tr><td>15.</td><td>40</td><td class="mm-wrap-cell">3, 62, 65</td><td>3</td></tr>
<tr><td>16.</td><td>44</td><td class="mm-wrap-cell">8</td><td>1</td></tr>
<tr><td>17.</td><td>59</td><td class="mm-wrap-cell">22, 23</td><td>2</td></tr>
<tr><td>18.</td><td>64</td><td class="mm-wrap-cell">13</td><td>1</td></tr>
<tr><td>19.</td><td>73</td><td class="mm-wrap-cell">9</td><td>1</td></tr>
<tr class="mm-tot"><td colspan="2">Total</td><td>507 &nbsp; 1592</td><td>29</td></tr>
</tbody></table></div>
<p>507 + 1592 + 29 = 2128 = 19x112</p>

<h3>1. One God (Shahaadah)</h3>
<p>As mentioned earlier, the word &ldquo;ONE&rdquo; that refers to God occurs in the Quran 19 times. The reference to God &ldquo;ALONE&rdquo; occurs 5 times, and the sum of the sura and verse numbers where we find these five occurrences is 361, 19x19. The &ldquo;First Pillar of Islam&rdquo; is stated in 3:18 as &ldquo;LAA ELAAHA ELLA HOO&rdquo; (There is no other god besides Him). This most important expression occurs in 19 suras. The first occurrence is in 2:163, and the last occurrence is in 73:9. Table 22 shows that the total of sura numbers, plus the number of verses between the first and last occurrences, plus the sum of these verse numbers is 316502, or 19x16658. Also, by adding the numbers of the 19 suras where LAA ELAAHA ELLA HOO occurs, plus the verse numbers where this crucial expression is found, plus the total number of occurrences (29), the Grand Total comes to 2128, or 19x112. The details are shown in Table 23.</p>

<h3>2. The Contact Prayers &ldquo;Salat&rdquo;</h3>
<p>The word &ldquo;Salat&rdquo; occurs in the Quran 67 times, and when we add the numbers of suras and verses of these 67 occurrences, the total comes to 4674, or 19x246 (see INDEX OF THE QURAN).</p>

<h3>3. Fasting (Seyaam)</h3>
<p>The commandment to fast is mentioned in 2:183, 2:184, 2:185, 2:187, 2:196; 4:92; 5:89, 95; 33:35, 35; &amp; 58:4. The total of these numbers is 1387, or 19x73. It is noteworthy that 33:35 mentions fasting twice, one for the believing men, and the other for the believing women.</p>

<h3>4. The Obligatory Charity (Zakat) &amp; 5. Hajj Pilgrimage to Mecca</h3>
<p>While the first three &ldquo;Pillars of Islam&rdquo; are obligatory upon all Muslim men and women, the Zakat and Hajj are decreed only for those who can afford them. This explains the interesting mathematical phenomenon associated with Zakat and Hajj.</p>
<p>The Zakat charity is mentioned in 2:43, 2:83, 2:110, 2:177, 2:277; 4:77, 4:162; 5:12, 5:55, 7:156; 9:5, 9:11, 9:18, 9:71; 18:81; 19:13, 19:31, 19:55; 21:73; 22:41, 22:78; 23:4; 24:37, 24:56; 27:3; 30:39; 31:4; 33:33; 41:7; 58:13; 73:20; and 98:5. These numbers add up to 2395. This total does not quite make it as a multiple of 19; it is up by 1.</p>
<p>The Hajj Pilgrimage occurs in 2:189, 2:196, 2:197; 9:3; and 22:27. These numbers add up to 645, and this total does not quite make it as a multiple of 19; it is down by 1.</p>
<p>Thus, Zakat and Hajj, together, give a total of 2395+645 = 3040 = 19x160.</p>
</div>

<div class="mm-section" id="mathematical-structure">
<h2>The Quran&rsquo;s Mathematical Structure</h2>
<p>The Quran&rsquo;s suras, verses, words, and letters are not only mathematically composed, but also arranged into a superhuman structure that is purely mathematical, i.e., the literary content has nothing to do with such an arrangement. Since the physical construction of the Quran is purely mathematical, it would be expected that the numbers mentioned in the Quran must conform with the Quran&rsquo;s 19-based code.</p>
<p>A total of 30 unique numbers are mentioned throughout the Quran, and the sum of all these numbers is 162146, a multiple of 19 (162146 = 19x8534). Table 24 lists all the numbers mentioned in the Quran, without the repetitions.</p>

<div class="mm-tcap">Table 24: All the Quranic Numbers</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Number</th><th>Location Example</th></tr></thead>
<tbody>
<tr><td>1</td><td>2:163</td></tr>
<tr><td>2</td><td>4:11</td></tr>
<tr><td>3</td><td>4:171</td></tr>
<tr><td>4</td><td>9:2</td></tr>
<tr><td>5</td><td>18:22</td></tr>
<tr><td>6</td><td>25:59</td></tr>
<tr><td>7</td><td>41:12</td></tr>
<tr><td>8</td><td>69:17</td></tr>
<tr><td>9</td><td>27:48</td></tr>
<tr><td>10</td><td>2:196</td></tr>
<tr><td>11</td><td>12:4</td></tr>
<tr><td>12</td><td>9:36</td></tr>
<tr><td>19</td><td>74:30</td></tr>
<tr><td>20</td><td>8:65</td></tr>
<tr><td>30</td><td>7:142</td></tr>
<tr><td>40</td><td>7:142</td></tr>
<tr><td>50</td><td>29:14</td></tr>
<tr><td>60</td><td>58:4</td></tr>
<tr><td>70</td><td>9:80</td></tr>
<tr><td>80</td><td>24:4</td></tr>
<tr><td>99</td><td>38:23</td></tr>
<tr><td>100</td><td>2:259</td></tr>
<tr><td>200</td><td>8:65</td></tr>
<tr><td>300</td><td>18:25</td></tr>
<tr><td>1000</td><td>2:96</td></tr>
<tr><td>2000</td><td>8:66</td></tr>
<tr><td>3000</td><td>3:124</td></tr>
<tr><td>5000</td><td>3:125</td></tr>
<tr><td>50000</td><td>70:4</td></tr>
<tr><td>100000</td><td>37:147</td></tr>
<tr class="mm-tot"><td>Total</td><td>162146 (19 x 8534)</td></tr>
</tbody></table></div>
<p>The numbers which are mentioned only once in the Quran are: 11, 19, 20, 50, 60, 80, 99, 300, 2000, 3000, 5000, 50000, and 100000. All the numbers mentioned in the Quran, with repetitions, occur 285 times, and this number is a multiple of 19; 285 = 19x15.</p>
</div>

<div class="mm-section" id="numbers-suras-verses">
<h2>The Numbers of Suras and Verses</h2>
<div class="mm-tcap">Table 25: Mathematical Coding of the Sura and Verse Numbers</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura No.</th><th>No. of Verses</th><th>Sum of Verse #s</th><th>Total</th></tr></thead>
<tbody>
<tr><td>1</td><td>7</td><td>28</td><td>36</td></tr>
<tr><td>2</td><td>286</td><td>41041</td><td>41329</td></tr>
<tr><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td></tr>
<tr><td>9</td><td>127</td><td>8128</td><td>8264</td></tr>
<tr><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td></tr>
<tr><td>113</td><td>5</td><td>15</td><td>133</td></tr>
<tr><td>114</td><td>6</td><td>21</td><td>141</td></tr>
<tr class="mm-tot"><td>Total</td><td>6555</td><td>6234</td><td>333410</td></tr>
</tbody></table></div>
<p>346199 (19x19x959)</p>
<p>The numbering system of the Quran&rsquo;s suras and verses has been perfectly preserved. Only a few unauthorized and easily detectable printings deviate from the standard system that is divinely guarded. When we add the numbers of all suras, plus the number of verses in every sura, plus the sum of verse numbers, the Grand total for the whole Quran comes to 346199, 19x19x959. Table 25 is an abbreviated presentation of these data. Thus, the slightest alteration of a single sura or verse would have destroyed this system. As shown in Table 16, if we consider only the 29 initialed suras, these same data produce a Grand Total which is also a multiple of 19. It follows that the data for the un-initialed suras are also divisible by 19.</p>

<div class="mm-tcap">Table 26: Mathematical Coding of the 85 Un-initialed Suras</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura No.</th><th>No. of Verses</th><th>Sum of Verse #s</th><th>Total</th></tr></thead>
<tbody>
<tr><td>1</td><td>7</td><td>28</td><td>36</td></tr>
<tr><td>4</td><td>176</td><td>15576</td><td>15756</td></tr>
<tr><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td></tr>
<tr><td>9</td><td>127</td><td>8128</td><td>8264</td></tr>
<tr><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td><td>&hellip;</td></tr>
<tr><td>113</td><td>5</td><td>15</td><td>133</td></tr>
<tr><td>114</td><td>6</td><td>21</td><td>141</td></tr>
<tr class="mm-tot"><td>Total</td><td>5733</td><td>3491</td><td>146842</td></tr>
</tbody></table></div>
<p>156066 (19x8214)</p>
<p>Table 26 is an abbreviated presentation of the same data related to the 85 un-initialed suras.</p>
<p>Now let us look at another set of miracles involving the sura and verse numbers.</p>

<div class="mm-tcap">Table 27: Sura, Total Number of Verses, Verse Numbers and Sum of Verse Numbers for Every Sura</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura</th><th class="mm-wrap-cell">Sura, # of Verses, Verse #&rsquo;s &amp; Sum of Verse #&rsquo;s</th></tr></thead>
<tbody>
<tr><td>1</td><td class="mm-wrap-cell">1 7 123456 7 28</td></tr>
<tr><td>2</td><td class="mm-wrap-cell">2 286 12345 &hellip; 286 41041</td></tr>
<tr><td>&hellip;</td><td class="mm-wrap-cell">&hellip;</td></tr>
<tr><td>114</td><td class="mm-wrap-cell">114 6 123456 21</td></tr>
</tbody></table></div>
<p>Total is 759 digits &amp; a multiple of 19.</p>
<p>Write down the sura number, followed by the number of verses in that sura, then the number of every verse, and finally, the sum of verse numbers. So, for Sura 1 you would write 1 for the sura, then 7 for the number of verses, 1234567 for each verse number, and finally 28 for the sum of verse numbers, i.e. 1 7 1234567 28. The number for Sura 2 will look like this: 2 286 123456&hellip;286 41041. Do the same for all the 114 suras, and then add these numbers. The total consists of 759 digits, and is a multiple of 19.</p>

<div class="mm-tcap">Table 28: Number of Verses for Every Sura &amp; Sum of Verse Numbers, Justified to the Left</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura</th><th>Total Verses &amp; Sum of Verses</th></tr></thead>
<tbody>
<tr><td>1</td><td>728</td></tr>
<tr><td>2</td><td>28641041</td></tr>
<tr><td>3</td><td>20020100</td></tr>
<tr><td>&hellip;</td><td>&hellip;</td></tr>
<tr><td>114</td><td>621</td></tr>
<tr class="mm-tot"><td>Total</td><td>4859309774 = 19x255753146</td></tr>
</tbody></table></div>
<p>Now write down the total number of verses in a sura, followed by the sum of verse numbers, and keep all numbers justified to the left. For example, the number of verses in Sura 1 is 7, and the sum of verse numbers is 28. Thus, the combined number for Sura 1 will be 7 28, for Sura 2 it will be 286 41041, for Sura 3 it will be 200 20100; and so on to Sura 114 for which the combined number is 6 21. Remember that these numbers are written all the way to the left, as shown in Table 28. Then add them in the usual manner, from right to left. The total of all these left justified numbers is 4,859,309,774 or 19 x 255753146.</p>

<div class="mm-tcap">Table 29: Verse Numbers and Sum of Verse Numbers, Justified to the Left</div>
<div class="mm-table-wrap"><table class="mm-table">
<thead><tr><th>Sura</th><th class="mm-wrap-cell">Verse #&rsquo;s &amp; Sum of Verses</th></tr></thead>
<tbody>
<tr><td>1</td><td class="mm-wrap-cell">123456728</td></tr>
<tr><td>2</td><td class="mm-wrap-cell">1234&hellip;28641041</td></tr>
<tr><td>&hellip;</td><td class="mm-wrap-cell">&hellip;</td></tr>
<tr><td>114</td><td class="mm-wrap-cell">12345621</td></tr>
</tbody></table></div>
<p>Total is 757 digits &amp; a multiple of 19.</p>
<p>Finally, do the same thing as above (continuing to keep all numbers left justified), except write down the number of every verse, instead of the total number of verses. For example, the number of Sura 1 consists of its seven verse numbers (1234567) combined with the sum of those numbers (28). Thus the combined number for Sura 1 will be 1234567 28. The combined number for Sura 114 will be 123456 21.</p>
<p>Table 29 demonstrates this process. The total of all these left justified numbers consists of 757 digits, and is still a multiple of 19.</p>
</div>

<div class="mm-section" id="superhuman-combinations">
<h2>Superhuman Numerical Combinations</h2>
<p>Let us write down the number of each verse in the Quran, preceded for each sura by the number of verses in that sura. Thus, Sura 1, which consists of seven verses, will be represented by the number 7 1234567. What we are doing here is forming long numbers by writing the numbers of verses next to each other. To find the number representing Sura 2, you write down the number of verses in this sura, 286, followed by the number of every verse, written next to each other. Thus, the number representing Sura 2 will look like this: 286 12345&hellip;.284285286. The two numbers representing the first two suras are:</p>
<div class="mm-longnum">7 1 2 3 4 5 6 7  &amp;  286 1 2 3 4 5&hellip;.284 285 286.</div>
<p>Putting these two numbers together to form one number representing the first two suras, we get this number:</p>
<div class="mm-longnum">7 1 2 3 4 5 6 7 286 1 2 3 4 5&hellip;.284 285 286.</div>
<p>This process is continued until every verse in the Quran is written down, thus forming one very long number encompassing the number in every verse in the Quran. The number representing the whole Quran is a multiple of 19 &amp; consists of 12692 digits, which is also a multiple of 19.</p>
<div class="mm-longnum">7 1234567 286 12345&hellip;286 &hellip;5 12345 6 123456</div>
<p class="mm-numlabel">FIRST No.</p>
<p>This very long number consists of 12692 digits (19x668) and includes every verse in the Quran. The number of verses in each sura precedes its verses. A special computer program that divides very long numbers has shown that this long number is a multiple of 19.</p>

<p>Instead of putting the total number of verses in every sura ahead of the sura, let us put it at the end of every sura. Thus, the number representing Sura 1 will look like this: 1234567 7, instead of 7 1234567. The number representing Sura 2 will look like this: 12345&hellip;.284 285 286 286 instead of 286 12345&hellip;.284285286. The numbers representing the first two suras will look like this:</p>
<div class="mm-longnum">1 2 3 4 5 6 7 7  &amp;  1 2 3 4 5&hellip;.284 285 286 286.</div>
<p>Putting these two numbers together to form a longer number representing the first two suras, we get a number that looks like this:</p>
<div class="mm-longnum">1 2 3 4 5 6 7 7 1 2 3 4 5&hellip;.284 285 286 286.</div>
<p>Since we are putting the total number of verses per sura at the end of each sura, we must put the total number of numbered verses (6234) at the end of the Quran. The last numbers, therefore, represent the last sura (123456 6), followed by the number of verses in the Quran (6234):</p>
<div class="mm-longnum">1 2 3 4 5 6 6  &amp;  6234  &gt;&gt;&gt;&gt;&gt;&gt;  1 2 3 4 5 6 6 6234.</div>
<p>Putting together all the verses of all the suras, produces a long number that consists of 12696 digits, and is a multiple of 19.</p>
<div class="mm-longnum">1234567 7 12345&hellip;286 286 12345 5&hellip;123456 6 6234</div>
<p class="mm-numlabel">SECOND No.</p>
<p>The number of every verse in every sura is followed by the number of verses per sura. The last 11 digits shown here are the 6 verses of the last sura, followed by its number of verses (6), followed by the total number of numbered verses in the Quran (6234). The complete, very long number, is a multiple of 19.</p>

<p>Now let us include the number of every sura. Write down the number of every verse in every sura, followed by the number of the sura, followed by the number of verses in the sura. Thus, the number representing Sura 1 looks like this: 1 2 3 4 5 6 7 1 7. The number representing Sura 2 looks like this: 1 2 3 4 5 &hellip;.284 285 286 2 286. The number representing the last sura (No. 114) looks like this: 1 2 3 4 5 6 114 6. Again, the total number of numbered verses (6234) is added at the end. This number representing the whole Quran, is a multiple of 19; it looks like this:</p>
<div class="mm-longnum">1 2 3 4 5 6 7 1 7 12345 &hellip; 286 2 286 &hellip;123456 114 6 6234</div>
<p class="mm-numlabel">THIRD No.</p>
<p>The number of every verse, followed by the sura number, then the number of verses in the sura. The total number of numbered verses is added at the end. The long number (12930 digits) is a multiple of 19.</p>

<p>Instead of putting the total number of verses in every sura after the sura, let us now put it ahead of the sura. Thus, the number representing Sura 1 looks like this: 7 1234567 1, instead of 1234567 1 7, and the number representing Sura 2 looks like this: 286 12345&hellip;.284 285 286 2, instead of 12345 &hellip; 284 285 286 2 286. This very long number representing the whole Quran is a multiple of 19.</p>
<div class="mm-longnum">7 1234567 1 286 12345&hellip;286 2&hellip;6 123456 114 6234</div>
<p class="mm-numlabel">FOURTH No.</p>
<p>The total number of verses in each sura is followed by the number of every verse, then the sura number. The last 14 digits shown above are the number of verses in the last sura (6), followed by the numbers of the six verses (123456), followed by the number of the sura (114), then the total number of numbered verses in the Quran. The very long number (consisting of 12930 digits) is a multiple of 19.</p>

<p>Now, let us write down the number of every verse in every sura, followed by the sum of verse numbers for every sura. Sura 1 consists of 7 verses, and the sum of verse numbers is 1+2+3+4+5+6+7 = 28. Thus, the number representing Sura 1 looks like this: 1234567 28.</p>
<p>The sum of verse numbers for Sura 2 is 41041 (1+2+3+&hellip; + 286). Thus, the number representing Sura 2 looks like this: 12345&hellip;284 285 286 41041.</p>
<p>The number representing the last sura, which consists of 6 verses, looks like this: 123456 21, since 1+2+3+4+5+6 = 21.</p>
<p>The complete number, representing the whole Quran, consists of 12836 digits and is a multiple of 19. It looks like this:</p>
<div class="mm-longnum">1234567 28 12345&hellip;284285286 41041&hellip;123456 21</div>
<p class="mm-numlabel">FIFTH No.</p>
<p>The number of every verse in every sura is followed by the sum of verse numbers. The long number consists of 12836 digits, and is a multiple of 19.</p>

<p>Remarkably, if we take the &ldquo;Fifth No.&rdquo; shown above and reverse the order of verse numbers and sum of verse numbers, i.e., move the sum of verse numbers, and put it ahead of the sura, the resulting long number is still a multiple of 19.</p>
<div class="mm-longnum">28 1234567 41041 12345&hellip;.285286&hellip;.21 123456</div>
<p class="mm-numlabel">SIXTH No.</p>
<p>Placing the sum of verse numbers ahead of each sura, instead of after it, produces a long number (12836 digits) that is also a multiple of 19.</p>

<p>Even writing the suras backward, i.e., reversing the order of suras by starting with the last sura and ending with the first sura, and placing the sum of verse numbers after the verses of each sura, the product is still a multiple of 19.</p>
<div class="mm-longnum">123456 21 12345 15&hellip;.12345&hellip;286 41041 1234567 28</div>
<p class="mm-numlabel">SEVENTH No.</p>
<p>Reversing the order of suras &mdash; starting from the last sura and ending with the first sura &mdash; and writing down the number of every verse, with the sum of verse numbers for every sura after its verses, the product is a long number consisting of 12836 digits. This long number is a multiple of 19.</p>

<p>Write the sum of verse numbers for the whole Quran (333410), followed by the total number of numbered verses in the Quran (6234), then the number of suras (114). Every sura is then represented by its number followed by its number of verses. The numbers representing Suras 1 and 2 are 1 7 and 2 286. The complete number, covering all suras of the Quran, consists of 474 digits, and is a multiple of 19 &mdash; it looks like this:</p>
<div class="mm-longnum">333410 6234 114 1 7 2 286 3 200 .. 113 5 114 6</div>
<p class="mm-numlabel">EIGHTH No.</p>
<p>The Grand Sum of verse numbers (333410) is followed by the total number of numbered verses (6234), the number of suras (114), then the sura numbers and numbers of verses of every sura.</p>

<p>Now let us reverse the order of sura number and its number of verses as presented in the &ldquo;Eighth No.&rdquo; Thus, the numbers representing the first two suras look like this: 7 1 &amp; 286 2, instead of 1 7 &amp; 2 286. The complete number also consists of 474 digits and is still a multiple of 19. It looks like this:</p>
<div class="mm-longnum">333410 6234 114 7 1 286 2 200 3 &hellip; 5 113 6 114</div>
<p class="mm-numlabel">NINTH No.</p>
<p>Reversing the sequence of sura number and number of verses still gives us a long number that is a multiple of 19.</p>

<p>If we write down the sum of verse numbers for Sura 1 (28), followed by the sum of verse numbers for Sura 2 (41041), and so on to the end of the Quran, and placing the Grand Sum of verse numbers (333410) at the end, the resulting long number (Tenth No.) consists of 377 digits, and is a multiple of 19.</p>
<div class="mm-longnum">28 41041 20100 ..... 15 21 333410</div>
<p class="mm-numlabel">TENTH No.</p>
<p>The sums of verse numbers for every sura in the Quran, are written next to each other, followed at the end by the Grand Sum of verse numbers (333410). This long number (377 digits) is a multiple of 19.</p>

<p>If we write down the number of suras in the Quran (114), followed by the total number of numbered verses (6234), followed by the number of every sura and its sum of verse numbers, the final long number (612 digits) is a multiple of 19.</p>
<div class="mm-longnum">114 6234 1 28 2 41041 3 20100 .... 113 15 114 21</div>
<p class="mm-numlabel">ELEVENTH No.</p>
<p>The number of suras, followed by the total number of numbered verses, then the number of every sura and its sum of verse numbers, produce this long number (612 digits) that is a multiple of 19.</p>

<p>Lest anyone may think that any Quranic parameter is left un-guarded with this awesome mathematical code, let us look at more parameters.</p>
<p>If we write down the number of suras (114), followed by the total number of numbered verses, followed by the Grand Sum of verse numbers in the whole Quran (333410), followed by the numbers of every sura and its verses, we end up with a very long number (12712 digits) that is a multiple of 19.</p>
<div class="mm-longnum">114 6234 333410 1 1 2 3 4 5 6 7..............114 1 2 3 4 5 6</div>
<p class="mm-numlabel">TWELFTH NUMBER</p>

<p>If we write down the numbers of verses in every sura next to each other, we end up with a 235-digit number that is a multiple of 19. To do this, write down the total number of numbered verses in the Quran (6234), followed by the number of verses in every sura, then close with the total number of numbered verses in the Quran. The final long number looks like this:</p>
<div class="mm-longnum">6234 7 286 200 176 ..... 127 ..... 5 4 5 6 6234
(total verses)  (First 4 suras)      (Sura 9)      (Last 4 suras)  (total verses)</div>
<p class="mm-numlabel">THIRTEENTH NUMBER</p>

<p>If we write down the number of numbered verses in the Quran (6234), followed by the number of suras (114), followed by the number of every verse in every sura, then close with the number of numbered verses in the Quran (6234) and the number of suras (114), the final number consists of 12479 digits, and is a multiple of 19.</p>
<div class="mm-longnum">6234 114 1234567 12345.........286.............123456 6234 114</div>
<p class="mm-numlabel">FOURTEENTH NUMBER</p>

<p>Another long number that consists of 12774 digits is formed by writing down the number of every verse in every sura, followed by the number of every sura added to its number of verses. Sura 1 consists of 7 verses, and the total 1+7 is 8. Therefore, the number representing Sura 1 looks like this: 1234567 8. Since Sura 2 consists of 286 verses, the number representing Sura 2 looks like this: 12345&hellip;286 288. This is done for every sura in the Quran. The final combined number consists of 12774 digits, and is a multiple of 19.</p>
<div class="mm-longnum">1234567   8   12345....286   288   ..........   123456   120
    (1+7)              (2+286)                              (114+6)</div>
<p class="mm-numlabel">FIFTEENTH NUMBER</p>

<p>More specialized features are in Appendices 2, 9, 19, 24, 25, 26, 29, and 37.</p>
</div>

<div class="mm-section" id="witness">
<h2>A Witness From the Children of Israel [46:10]</h2>
<div class="mm-quote">Proclaim: &ldquo;What if it is from God, and you disbelieved in it? A witness from the Children of Israel has borne witness to a similar phenomenon, and he has believed, while you have turned too arrogant to believe. God does not guide the wicked.&rdquo;<cite>Quran 46:10</cite></div>
<p>The following quotation is taken from STUDIES IN JEWISH MYSTICIM, (Association for Jewish Studies, Cambridge, Mass., Joseph Dan &amp; Frank Talmage, eds., Page 88, 1982). The quotation refers to the work of Rabbi Judah the Pious (12th Century AD):</p>
<div class="mm-callout"><p>&ldquo;The people [Jews] in France made it a custom to add [in the morning prayer] the words: &lsquo;`Ashrei temimei derekh [blessed are those who walk the righteous way],&rsquo; and our Rabbi, the Pious, of blessed memory, wrote that they were completely and utterly wrong. It is all gross falsehood, because there are only nineteen times that the Holy Name is mentioned [in that portion of the morning prayer]&hellip; and similarly you find the word `Elohim nineteen times in the pericope of Ve-&rsquo;elleh shemot&hellip;. Similarly, you find that Israel were called &lsquo;sons&rsquo; nineteen times, and there are many other examples. All these sets of nineteen are intricately intertwined, and they contain many secrets and esoteric meanings, which are contained in more than eight large volumes&hellip; Furthermore, in this section there are 152 (19x8) words.&rdquo;</p></div>

<p class="mm-back"><a href="#top">&uarr; Back to Contents</a></p>
</div>

</div>
</article>

<?php get_footer(); ?>
