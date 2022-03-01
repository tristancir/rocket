<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('home');
});


Route::get('/feed', 'FeedItemController@index');
Route::get('/feed/offset/{offset}', 'FeedItemController@index2');
Route::get('/feed/filter/{filter}/offset/{offset}', 'FeedItemController@index');


Route::get('/judge', 'JudgeController@index');

Route::get('/cp', function(){
    return view('channel_post.create');
});

Route::get('/discord', 'DiscordController@index');
Route::get('/discord/oauth', 'DiscordController@oauth');

Route::get('/random/{rand}', 'FeedController@random');
Route::get('/view/random/{rand}', 'FeedController@randomView');
Route::post('/posts/remove', 'FeedController@remove');

Route::get('/content/create', 'ContentController@create')->name('content.create');
Route::post('/content/create', 'ContentController@store');
Route::get('/content/set/{x}', 'ContentController@media');
Route::get('/content/view/set/{x}', 'ContentController@mediaView');
Route::get('/content/httpget/url/{url}', 'ContentController@httpgetUrl');
Route::get('/content/httpget/{id}', 'ContentController@httpgetId');



Route::get('/content/twinks/{x}', function(){
    return response("https://dn0.newtumbl.com/img/1207679/119028796/1/38784184/nT_y9diqc6nuurpsgk4hnzg7pdf.jpg
https://dn1.newtumbl.com/img/1207679/119028965/1/57703860/nT_bh6rqbafvtbh9pnvjyiau9bh.png
https://dn2.newtumbl.com/img/1207679/119058582/1/156666872/nT_kezua33yu3ri5f7aiyp9ssuv.gif
https://dn1.newtumbl.com/img/1207679/119202389/1/24079453/nT_q8fgae0bi2jzgeicfp71g4d5.jpg
https://dn3.newtumbl.com/img/1207679/121385011/1/121977291/nT_95xuf5fy3n6qd594shphydh3.jpg
https://dn2.newtumbl.com/img/1207679/129721270/1/183739670/nT_vkdd7sivjcgsi3fkbiz3fr22.jpg
https://dn2.newtumbl.com/img/1207679/129721270/3/183739675/nT_g0xpu0c4f7gvi1zh76v5zh86.jpg
https://dn2.newtumbl.com/img/1207679/129721270/4/183739677/nT_tkn2fai0qaujr810hbb4c2e4.jpg
https://dn2.newtumbl.com/img/1207679/129721270/6/183739680/nT_pvb1gzyk13vfnf8c52f495uk.jpg
https://dn2.newtumbl.com/img/1207679/129721270/8/183739685/nT_uyy6pr021vhvdr57dzsgy2nh.jpg
https://dn3.newtumbl.com/img/353629/132417907/1/163227731/nT_176yka75jvcdhzspv6pqut2c.mp4
https://dn2.newtumbl.com/img/353629/127490514/1/175723243/nT_jceu969jn4b1zx7k509xqthg.mp4
https://dn1.newtumbl.com/img/353629/122888625/1/156035472/nT_qbj5vev790zc2r6nhpc2fb3d.mp4
https://dn2.newtumbl.com/img/1207679/129721270/9/183739687/nT_8nc6p192y1hxftj4thnxnyjk.jpg
https://dn0.newtumbl.com/img/1207679/129724608/1/183744469/nT_19epasqg7b5556yy210viqu2.gif
https://dn0.newtumbl.com/img/1207679/129724608/5/183744476/nT_bya7b1uy4x7vjgh5u42vsppi.jpg
https://dn1.newtumbl.com/img/1207679/131036685/1/185534002/nT_a1nk98ird3jt23abc7vc1j1i.mp4
https://dn1.newtumbl.com/img/8462/123412589/1/165971291/nT_tx7cusv1cgpcfc53nfs86i4y.jpg
https://dn1.newtumbl.com/img/1207679/132390321/3/187402613/nT_q6dshi4sncg71ubuufekxzvp.gif
https://dn1.newtumbl.com/img/1207679/132390321/4/187402614/nT_rxu4qc1jzgj76has36xhj57u.gif
https://dn1.newtumbl.com/img/1207679/132390877/2/187403298/nT_0vpppde6v2cpty602tkp1i76.gif
https://dn3.newtumbl.com/img/1065907/129469583/1/140821092/nT_y07fc93dva5edj375kk2undh.jpg
https://dn1.newtumbl.com/img/1065907/129604285/1/183584851/nT_n32s0vbfd4h8kj01fuhqtj0v.jpg
https://dn0.newtumbl.com/img/1065907/130412900/1/184680844/nT_1uzfs0zj5yvpfuq8af8zpi33.png
https://dn2.newtumbl.com/img/1207679/129721270/2/183739672/nT_cb0vuaiqy8nvqqt2tnzji0se.jpg
https://dn2.newtumbl.com/img/1207679/121399162/1/171787251/nT_kcda3rpryqikdn2ztzq0tvpz.mp4
https://dn1.newtumbl.com/img/1207679/122522445/1/56548285/nT_zt8tajr5895shcqz0hee2p3p.jpg
https://dn1.newtumbl.com/img/81495/135649157/1/189168708/nT_r11rn3urz28b4kidnspnhbai.mp4
https://dn3.newtumbl.com/img/1207679/118926907/1/18183565/nT_9g1y4j6pxj8sjxvtfbvfa8t3.jpg
https://dn1.newtumbl.com/img/1207679/118927277/1/137414171/nT_4z96pxxgcvzgh66t9dnuiaar.jpg
https://dn1.newtumbl.com/img/1207679/119022637/1/169158294/nT_if8exfetnijy47zq39pbzz34.jpg
https://dn0.newtumbl.com/img/1207679/119192928/1/30214060/nT_e17jgh4c0pnpcr5ah068dbup.jpg
https://dn0.newtumbl.com/img/1207679/119193028/1/106265334/nT_ighpnvsnxc15jksk7nkepud5.mp4
https://dn3.newtumbl.com/img/1207679/119201827/1/46386972/nT_t9bx03vj71458z2bv7eqax31.jpg
https://dn3.newtumbl.com/img/1207679/121344655/1/167856768/nT_8xsqa4sgiit8a8fggk0p21y8.mp4
https://dn0.newtumbl.com/img/1207679/121384956/1/122138883/nT_yt0gnjjhyxd3vth4kg0s2071.jpg
https://dn3.newtumbl.com/img/1207679/122046659/1/170162079/nT_vvkc5n8t51iy0atz6ugi6qh8.jpg
https://dn3.newtumbl.com/img/1207679/123770827/1/174206973/nT_edyynjthtbi6sireyf2h1zy5.mp4
https://dn2.newtumbl.com/img/1207679/127603342/1/180126292/nT_r2494hh5770g9daz3ht5v1gg.jpg
    ", 200)->header('Content-Type', 'text/plain');
    });

Route::get('get/anal', function(){
    return response("https://dn0.newtumbl.com/img/825770/52135368/1/65354880/nT_eb982zspyczbq7vy3igj8vt5.gif
https://dn2.newtumbl.com/img/825770/52138246/1/48432260/nT_s0igr689nsng9saehxi6kh8v.gif
https://dn0.newtumbl.com/img/825770/51851284/1/59926931/nT_htukaz9sxupj95gqvjv1t4gv.mp4
https://dn3.newtumbl.com/img/825770/51749991/1/40120420/nT_zicduf6qq9h67g9a9tzf197u.gif
https://dn0.newtumbl.com/img/490788/21782652/1/31775524/nT_t12hd4puq4uev21y9ubft6gx.mp4
https://dn2.newtumbl.com/img/825770/52135710/1/15918118/nT_nh981tkj9p2xp3ubjte4u49z.gif
https://dn3.newtumbl.com/img/825770/52007875/1/5663342/nT_8ruy27xcg01416uzjbk83fxz.gif
https://dn3.newtumbl.com/img/825770/51850843/1/69791229/nT_5e4u0sc7pfjcz1e1k1vf4ffv.gif
https://dn2.newtumbl.com/img/825770/51622254/1/68533183/nT_1072g2ihihc1kqufe8pjdxi6.gif
https://dn2.newtumbl.com/img/825770/51545402/1/47950042/nT_8ibsnzyz9fpvz78vybencar5.jpg
https://dn1.newtumbl.com/img/825770/51544925/1/69487721/nT_bhg1diyg9p4t4s5rrns1e9nt.gif
https://dn3.newtumbl.com/img/825770/51544127/1/73281316/nT_4bzkrr8jzi5biy4rvbes2sa1.gif
https://dn1.newtumbl.com/img/825770/51317457/1/63552722/nT_gr4dhx2q2ccgnnbiccqx2axd.jpg
https://dn1.newtumbl.com/img/825770/56682625/1/51500190/nT_5r0gh6r4rdar5rs7x0kj36pi.mp4
https://dn2.newtumbl.com/img/825770/56008330/1/70636823/nT_643krfcb90h0qrqezzb9kyhj.mp4
https://dn3.newtumbl.com/img/825770/54565555/1/71237647/nT_itaivcnxie1g6u2z580by9ja.mp4
https://dn0.newtumbl.com/img/825770/52943720/1/72970134/nT_j2q5qsvsjq5davdcrtynenks.mp4
https://dn1.newtumbl.com/img/825770/52698097/1/76397745/nT_idkc03va4g5da0ze9q8zrij0.gif
https://dn1.newtumbl.com/img/825770/52386281/1/63719085/nT_zpihughfnhph5064eu0s5cbx.jpg
https://dn2.newtumbl.com/img/498683/115375926/1/54634462/nT_731pcfn0r7d3uch1tk8sg7hc.jpg
https://dn0.newtumbl.com/img/498683/95278708/1/135785629/nT_d7p9h4xbvdvgzby2z0ap9a56.gif
https://dn2.newtumbl.com/img/498683/109119694/1/142004702/nT_vpndngck7p868e4n6jsna29k.jpg
https://dn2.newtumbl.com/img/498683/109268610/1/54148697/nT_y4tty50jac78uru85f3eb9b5.jpg
https://dn2.newtumbl.com/img/490788/111403278/1/153573632/nT_zx91zkb9b595p3x2xek85dvv.mp4
https://dn2.newtumbl.com/img/490788/87529838/1/107157365/nT_zg790dzxavt3ca7dhhf1zhg4.mp4
https://dn0.newtumbl.com/img/490788/81185624/1/52089256/nT_z85qp5i6u47v5b7huiqkgixd.mp4
https://dn0.newtumbl.com/img/490788/81184440/1/115755752/nT_g3k0fzq3n6sv97k59rghqvu2.mp4
https://dn3.newtumbl.com/img/490788/78621363/1/48256032/nT_typ1n9tfbnc8quxb6zz6svd9.mp4
https://dn0.newtumbl.com/img/490788/77310232/1/110436744/nT_fuzdhqz1k8x1s8yak6zra58k.mp4
https://dn3.newtumbl.com/img/490788/72436119/1/84859700/nT_afzz7crtszz86x3jj9ve34f2.mp4
https://dn3.newtumbl.com/img/490788/69115595/1/8864562/nT_hhkif1rc1crthfvh3rv3r13b.mp4
https://dn1.newtumbl.com/img/490788/62976445/1/90815371/nT_e3axiy1g0c2ty6za5k2gnsi5.mp4
https://dn3.newtumbl.com/img/490788/44542651/1/64818663/nT_2tg42ssjprnfv0fnhxdn8fef.mp4
https://dn3.newtumbl.com/img/490788/35214759/1/50851265/nT_s8vk56832dj96ty6a72e72n5.mp4
https://dn1.newtumbl.com/img/490788/30645233/1/37884402/nT_qx8hic8d60ph9v56k5qju351.mp4
https://dn3.newtumbl.com/img/490788/29845703/1/30789997/nT_73cdajxha5n0nqkpy63uj868.mp4
https://dn3.newtumbl.com/img/490788/27958391/1/37189076/nT_hgre2nhzzb76us8ai3zy8h9d.mp4
https://dn0.newtumbl.com/img/490788/26725376/1/27864968/nT_2g1a1cvys9fr8cv82ez4zn07.mp4
https://dn2.newtumbl.com/img/490788/21785250/1/31779186/nT_zp6axegv26patrnp3g9yaxy2.mp4
https://dn2.newtumbl.com/img/490788/21783770/1/31777066/nT_ukj0kntcx4ec4rj9vcfvec4h.mp4
https://dn1.newtumbl.com/img/490788/21761609/1/31335823/nT_x0f88vf4ys49eb0jt3q4zyvh.mp4
https://dn1.newtumbl.com/img/596119/37024893/1/52195308/nT_b7y3zvhqrdfbjks34fftqjp6.mp4
https://dn1.newtumbl.com/img/366190/29933841/1/43314545/nT_52cbfqg26u22z7xyizaic3hv.mp4
", 200)->header('Content-Type', 'text/plain');
});

