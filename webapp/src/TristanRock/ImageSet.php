<?php
namespace TristanRock;

use App\{Flip, FlipItem};

class ImageSet
{
    public function get($set)
    {
        $content = $this->getFlip($set);
        if ( $content ) {
            return $content;
        }

        $db = [
            's1' => [
                'https://dn0.newtumbl.com/img/1207679/119028796/1/38784184/nT_y9diqc6nuurpsgk4hnzg7pdf.jpg',
                'https://dn2.newtumbl.com/img/1207679/118722670/1/164423415/nT_qr10689byd0fhegfq69ezjz6.jpg',
                'https://dn0.newtumbl.com/img/490788/91246528/1/130126243/nT_0nd58fd3u1nz34rpu0xxvn9v.jpg',
                'https://dn3.newtumbl.com/img/490788/91245227/1/79497689/nT_s4vbsjgu0c0adfr9cn18rfk8.jpg',
                'https://dn0.newtumbl.com/img/490788/90877708/1/129607175/nT_nttnkhid5k1vpetqi1f4i4qc.jpg',
                'https://dn1.newtumbl.com/img/1207679/118054297/1/166770292/nT_bcr2asag5cns6ig3put5dqcy.jpg',
                'https://dn3.newtumbl.com/img/1222419/118301835/1/168178850/nT_qyz92kb2p1770i3j6eu03vyh.png',
                'https://cdn.discordapp.com/attachments/600054342950846465/945224258416705586/unknown.png',
                'https://cdn.discordapp.com/attachments/600054342950846465/945224502659399721/unknown.png',
                'https://dn3.newtumbl.com/img/973103/134524103/1/190357846/nT_sr6vnpbvdapvfthv9fadrzir.gif',
                'https://dn3.newtumbl.com/img/67819/129063975/1/182854748/nT_kc7n075v2eba717f8vagv24g.gif',
                'https://dn3.newtumbl.com/img/973103/120860555/1/171656560/nT_hh2gd5syf7i180e8162pnt2b.jpg',
                'https://dn1.newtumbl.com/img/973103/119680433/1/170054177/nT_83a4rsir2iue5e4gb8hjasb8.jpg',
                'https://dn1.newtumbl.com/img/1207679/119028965/1/57703860/nT_bh6rqbafvtbh9pnvjyiau9bh.png',
                'https://dn2.newtumbl.com/img/1207679/119058582/1/156666872/nT_kezua33yu3ri5f7aiyp9ssuv.gif',
                'https://dn2.newtumbl.com/img/1283016/133019498/1/188278690/nT_cp282cx1p1qpv5e5qsrc7e2c.jpg',
                'https://dn0.newtumbl.com/img/151666/54688984/1/75752243/nT_eyi8ebhjbbpsa2uauehy2483.jpg',
                'https://dn1.newtumbl.com/img/151666/50861729/1/71953293/nT_ekh7g3rrqre1p0yqrqva5gt7.jpg',
                'https://dn2.newtumbl.com/img/151666/46600426/1/67606043/nT_sp5d4r3zvhq03e5vajpa9cje.gif',
                'https://dn1.newtumbl.com/img/151666/46600081/1/67601484/nT_vsfqbyik79s0avejx75h83y7.gif',
                'https://dn1.newtumbl.com/img/151666/46600081/7/67602186/nT_gxiz7rjq11aufc33ekgah6dn.gif',
                'https://dn1.newtumbl.com/img/151666/46600081/8/67602238/nT_df1qdyeyf64zncph1f5k7xph.gif',
                'https://dn0.newtumbl.com/img/1283016/135522356/1/191719501/nT_fkj0fdseh14ufjsuj6bdyuiy.jpg',
                'https://dn1.newtumbl.com/img/1283016/132882013/1/188089537/nT_qb9tiif4f5q4f3jd4gy3azjg.jpg',
                'https://dn2.newtumbl.com/img/1283016/132456842/1/187491473/nT_x7pjnpc5a18i0bqx6are2gyb.mp4',
                'https://dn3.newtumbl.com/img/1207679/121385011/1/121977291/nT_95xuf5fy3n6qd594shphydh3.jpg',
                'https://dn2.newtumbl.com/img/1207679/129721270/1/183739670/nT_vkdd7sivjcgsi3fkbiz3fr22.jpg',
                'https://dn2.newtumbl.com/img/1207679/129721270/3/183739675/nT_g0xpu0c4f7gvi1zh76v5zh86.jpg',
                'https://dn2.newtumbl.com/img/1207679/129721270/6/183739680/nT_pvb1gzyk13vfnf8c52f495uk.jpg',
                'https://dn0.newtumbl.com/img/1207679/129724608/1/183744469/nT_19epasqg7b5556yy210viqu2.gif',
                'https://dn0.newtumbl.com/img/1207679/129724608/5/183744476/nT_bya7b1uy4x7vjgh5u42vsppi.jpg',
                'https://dn1.newtumbl.com/img/1207679/131036685/1/185534002/nT_a1nk98ird3jt23abc7vc1j1i.mp4',
                'https://dn2.newtumbl.com/img/114590/3960810/1/6012568/nT_3x7tkkazuya6d0vt570kuy5e.gif',
                'https://dn1.newtumbl.com/img/8462/123412589/1/165971291/nT_tx7cusv1cgpcfc53nfs86i4y.jpg',
                'https://dn3.newtumbl.com/img/1160933/134561367/1/190417778/nT_a62uihx71ybgjeb6sqzavd4g.mp4',
                'https://dn1.newtumbl.com/img/1207679/132390321/3/187402613/nT_q6dshi4sncg71ubuufekxzvp.gif',
                'https://dn1.newtumbl.com/img/1207679/132390321/4/187402614/nT_rxu4qc1jzgj76has36xhj57u.gif',
                'https://dn3.newtumbl.com/img/1065907/129469583/1/140821092/nT_y07fc93dva5edj375kk2undh.jpg',
                'https://dn1.newtumbl.com/img/1065907/129604285/1/183584851/nT_n32s0vbfd4h8kj01fuhqtj0v.jpg',
                'https://dn0.newtumbl.com/img/1065907/130412900/1/184680844/nT_1uzfs0zj5yvpfuq8af8zpi33.png',
                'https://dn2.newtumbl.com/img/1207679/129721270/2/183739672/nT_cb0vuaiqy8nvqqt2tnzji0se.jpg',
                'https://dn2.newtumbl.com/img/1207679/121399162/1/171787251/nT_kcda3rpryqikdn2ztzq0tvpz.mp4',
                'https://dn1.newtumbl.com/img/1207679/122522445/1/56548285/nT_zt8tajr5895shcqz0hee2p3p.jpg',
                'https://dn3.newtumbl.com/img/1207679/118926907/1/18183565/nT_9g1y4j6pxj8sjxvtfbvfa8t3.jpg',
                'https://dn1.newtumbl.com/img/1207679/118927277/1/137414171/nT_4z96pxxgcvzgh66t9dnuiaar.jpg',
                'https://dn1.newtumbl.com/img/1207679/119022637/1/169158294/nT_if8exfetnijy47zq39pbzz34.jpg',
                'https://dn0.newtumbl.com/img/1207679/119192928/1/30214060/nT_e17jgh4c0pnpcr5ah068dbup.jpg',
                'https://dn0.newtumbl.com/img/1207679/119193028/1/106265334/nT_ighpnvsnxc15jksk7nkepud5.mp4',
                'https://dn3.newtumbl.com/img/1207679/119201827/1/46386972/nT_t9bx03vj71458z2bv7eqax31.jpg',
                'https://dn3.newtumbl.com/img/1207679/121344655/1/167856768/nT_8xsqa4sgiit8a8fggk0p21y8.mp4',
                'https://dn0.newtumbl.com/img/1207679/121384956/1/122138883/nT_yt0gnjjhyxd3vth4kg0s2071.jpg',
                'https://dn1.newtumbl.com/img/490788/70910485/1/40440008/nT_df5b5856a7p4pqxdgp68n5h4.jpg',
                'https://dn1.newtumbl.com/img/490788/69699913/1/93855558/nT_7cre31vgbt5b56is41fb50i4.jpg',
                'https://dn3.newtumbl.com/img/1207679/122046659/1/170162079/nT_vvkc5n8t51iy0atz6ugi6qh8.jpg',
                'https://dn3.newtumbl.com/img/1207679/123770827/1/174206973/nT_edyynjthtbi6sireyf2h1zy5.mp4',
                'https://dn3.newtumbl.com/img/973103/133077211/1/188357745/nT_6vtuqdh9ae7pahjue17h50yn.jpg',
                'https://dn2.newtumbl.com/img/1283257/129144374/11/182960158/nT_jf49eicbv5sgpd45drfbtbkz.jpg',
                'https://dn2.newtumbl.com/img/1207679/127603342/1/180126292/nT_r2494hh5770g9daz3ht5v1gg.jpg',
                'https://dn0.newtumbl.com/img/1160933/134994404/1/191000171/nT_4k1ccxijpaeuq16yib57ingh.mp4',
                'https://dn1.newtumbl.com/img/1214556/135223241/1/191313378/nT_thpyf5eccb08gdcsi5a13gqg.jpg',
                'https://dn2.newtumbl.com/img/84927/116051166/1/88115979/nT_c26817gr3ka3iy4i2aqrvg5j.jpg',
                'https://dn2.newtumbl.com/img/84927/73454618/1/105010241/nT_ysnhgii681sf50id2tyh7bgt.jpg',
                'https://dn3.newtumbl.com/img/1214556/135222647/1/191312521/nT_pfgtubhhtr69xicb31brxah9.png',
                'https://dn3.newtumbl.com/img/490788/86657471/1/121231020/nT_zuay3z6qrtvn7zyekx08urgh.jpg',
                'https://dn3.newtumbl.com/img/1207679/127247307/1/62557952/nT_fnxa871bhh09qdv80i5n5td7.mp4',
                'https://dn0.newtumbl.com/img/1207679/125921448/1/20447087/nT_nqqvxg087e3jfffhcgzazisx.mp4',
                'https://dn2.newtumbl.com/img/1207679/122038994/1/166232074/nT_uydnprn97upztr84sj31aje3.mp4',
                'https://dn0.newtumbl.com/img/1214556/134177152/1/189880983/nT_d47k089spx3idz2vkpeiv0fy.gif',
                'https://cdn.discordapp.com/attachments/600054342950846465/945225219688239174/unknown.png',
                'https://dn3.newtumbl.com/img/35946/458535/1/714606/nT_q3yeue8ugjszqtu0izsag0zi.jpg',
                'https://dn1.newtumbl.com/img/35946/439745/1/682774/nT_80ff510tf0eac3c74sd81hx9.jpg',
                'https://dn0.newtumbl.com/img/84927/135200972/1/166694128/nT_h03u3vig8edr8ti5ntr0bp4u.jpg',
                'https://dn0.newtumbl.com/img/114590/39271344/1/36614937/nT_79ib5p4kvacyxhu3a8iv6kva.jpg',
                'https://dn1.newtumbl.com/img/84927/135195233/1/190865391/nT_n03zdqx6h3kzjf1d0bkhkykp.jpg',
                'https://dn2.newtumbl.com/img/84927/134458570/1/189240240/nT_j7qrqyijhkkv2s8sfbatckdb.jpg',
                'https://dn3.newtumbl.com/img/114590/38653503/1/56383162/nT_y1g5t3gj3a1v0jn22vbb4j9a.png',
                'https://cdn.discordapp.com/attachments/600054342950846465/945225702846922842/unknown.png',
                'https://dn2.newtumbl.com/img/84927/125265546/1/164441183/nT_xkbctqanzhv731ha5h6s1kya.jpg',
                'https://dn0.newtumbl.com/img/1101452/125997968/1/151745052/nT_j7333hket8r6th5axscxyjnh_300.jpg',
            ],
            's2' => [
                'https://dn2.newtumbl.com/img/1283016/132704134/1/126186252/nT_exxen67c09eq0iudrpib1pir.mp4',
                'https://dn1.newtumbl.com/img/81495/135649157/1/189168708/nT_r11rn3urz28b4kidnspnhbai.mp4',
                'https://dn1.newtumbl.com/img/381428/39774037/1/33283768/nT_xef56vx4qdrp5htiv4rrbqyf.mp4',
                'https://dn1.newtumbl.com/img/490788/80140941/1/2183341/nT_fybcfh6942kgc26s3hrargpx.jpg',
                'https://dn2.newtumbl.com/img/1191627/135344522/1/189856525/nT_dbu3y2k2xnei6epk2zfb136p.jpg',
                'https://dn2.newtumbl.com/img/1191627/135344262/1/190236280/nT_hujvyipz0tnx6praccu43dzr.jpg',
                'https://dn0.newtumbl.com/img/1191627/135344092/1/191206903/nT_szj5tpye10a4hh5desre0fyd.jpg',
                'https://dn3.newtumbl.com/img/1191627/135086755/1/180121792/nT_x67ecp7ej2jj96v51460y7qr.gif',
                'https://dn3.newtumbl.com/img/84927/135196403/1/187990301/nT_fuk2cc1phk6fd2h5r2xfvc6r.gif',
                'https://dn1.newtumbl.com/img/1191627/135085849/1/182751823/nT_n8esvq7xrbrh4di1x8ppnfqb.gif',
                'https://dn3.newtumbl.com/img/973103/135509447/1/191702534/nT_p4bev79jri3rxyajpy1p84re.jpg',
                'https://dn1.newtumbl.com/img/1207679/119202389/1/24079453/nT_q8fgae0bi2jzgeicfp71g4d5.jpg',
                'https://dn2.newtumbl.com/img/973103/135508974/1/191701882/nT_ug032xg8h1uf937y100dkc92.jpg',
                'https://dn0.newtumbl.com/img/490788/37920216/1/54386954/nT_vv0v0n798ruxj76xt5vq2bvb.gif',
                'https://dn3.newtumbl.com/img/490788/29754271/1/14166500/nT_4xk77ju1h8xivh8tqfht245e.mp4',
                'https://dn2.newtumbl.com/img/122699/11619574/1/9419708/nT_6k956gj8qtq3q0a3a07g8tbf.png',
                'https://dn0.newtumbl.com/img/5494/114644952/1/162526802/nT_uz7f86kgkkcb12f71diuy1ry.mp4',
                'https://dn2.newtumbl.com/img/973103/135251206/1/191350956/nT_1zp736i7b1ryse8zynhks4xp.jpg',
                'https://dn3.newtumbl.com/img/973103/134753703/1/190669839/nT_sh8f82ibhq5qg8ksv9e020kk.jpg',
                'https://dn1.newtumbl.com/img/973103/134752145/1/190667851/nT_2ab83adsj6ajsxs06dxa96yb.jpg',
                'https://dn0.newtumbl.com/img/973103/134800180/1/145444545/nT_hs5h9uibnhbuxb2ey93d0z9n.jpg',
                'https://dn2.newtumbl.com/img/973103/134364650/1/190137981/nT_yeiz56enrxi1ttjbcghi4v34.gif',
                'https://dn2.newtumbl.com/img/490788/136117306/1/192526659/nT_05qbqbbgt7zcc6uhr4kr343j.gif',
                'https://dn2.newtumbl.com/img/973103/134158970/1/189856452/nT_8zccgc1cdse921sxfnq76rb3.jpg',
                'https://dn3.newtumbl.com/img/490788/42468015/1/61822737/nT_1tsdqvb5xtiukvj801gqdpgr.mp4',
                'https://dn0.newtumbl.com/img/490788/91246528/1/130126243/nT_0nd58fd3u1nz34rpu0xxvn9v.jpg',
                'https://dn2.newtumbl.com/img/973103/133821674/1/189390335/nT_2f9uzfy0yy65zgzja54apc7g.jpg',
                'https://dn2.newtumbl.com/img/1207679/129721270/4/183739677/nT_tkn2fai0qaujr810hbb4c2e4.jpg',
                'https://dn2.newtumbl.com/img/1207679/129721270/8/183739685/nT_uyy6pr021vhvdr57dzsgy2nh.jpg',
                'https://dn2.newtumbl.com/img/353629/127490514/1/175723243/nT_jceu969jn4b1zx7k509xqthg.mp4',
                'https://dn2.newtumbl.com/img/1207679/129721270/9/183739687/nT_8nc6p192y1hxftj4thnxnyjk.jpg',
                'https://dn1.newtumbl.com/img/1214556/127171397/1/180274724/nT_upbxgq5ca2kyfhhdpxtgpfkk.gif',
                'https://dn2.newtumbl.com/img/973103/133693782/1/185819339/nT_btx06nd9u6c7yuhk1813ax9g.mp4',
                'https://dn1.newtumbl.com/img/1214556/131529137/1/186221980/nT_qvpvgyc0jt0c3ghis0n4k8qk.jpg',
                'https://dn2.newtumbl.com/img/1214556/131054886/1/185560817/nT_urbab0c7344akrf815v9g2dt.gif',
                'https://dn3.newtumbl.com/img/973103/133413999/1/188817067/nT_zn7an4szig63kpd96h8nzxtv.jpg',
                'https://dn3.newtumbl.com/img/973103/133262487/1/188613536/nT_ti8qbrvv8vjqzbbzfcetdxe1.gif',
                'https://dn0.newtumbl.com/img/1214556/124644248/1/176827876/nT_e0yai4552g1cazp1hrudjgp2.gif',
                'https://dn0.newtumbl.com/img/490788/135878256/1/192204633/nT_gf1g2jg5phezbux51g8i8e7s.png',
                'https://dn3.newtumbl.com/img/973103/133077211/2/188357768/nT_trtxg0cfsdqde66580pj93sz.jpg',
                'https://dn2.newtumbl.com/img/973103/133074534/1/188354044/nT_h1g736hj4hpgb6krgay1j3ju.gif',
                'https://dn0.newtumbl.com/img/973103/132319256/1/187304394/nT_fbjxzcphfv3jtfe0zdfu462n.jpg',
                'https://dn3.newtumbl.com/img/1160933/131483423/3/186162042/nT_jg14ij85jnecjsb9hvf6texh.mp4',
                'https://dn3.newtumbl.com/img/1283257/135650923/1/191893438/nT_4zyfex45jr1cnrxzdcpi37gb.mp4',
                'https://dn1.newtumbl.com/img/1191627/134618273/1/89330090/nT_nr6djpx0chiczue42g9gqpcj.gif',
                'https://dn2.newtumbl.com/img/381428/65530374/1/30052068/nT_2ash89dguubjrx1patbb884f.mp4',
                'https://dn1.newtumbl.com/img/381428/56425133/1/75525375/nT_r68vtf68k5hrdpfn9zp9h2ti.mp4',
                'https://dn2.newtumbl.com/img/1283257/135417358/1/191575383/nT_fkz2v87bpgfiaayxj8pd4k2k.mp4',
                'https://dn1.newtumbl.com/img/1191627/134220393/1/189094532/nT_zaq12bsyuk9ihnytjqeer133.gif',
                'https://dn3.newtumbl.com/img/1191627/134220127/1/189851186/nT_83ftzqy7jbjg6b2ndjy7hnqp.gif',
                'https://dn2.newtumbl.com/img/1207679/128319034/1/27921463/nT_7hs002i6c4dgz9qh7kng84ct.mp4',
                'https://dn1.newtumbl.com/img/1160933/127321657/1/180475814/nT_z7vi8zc93sfyjcpq3rkb8pr3.mp4',
            ],
            's3' => [
                'https://dn2.newtumbl.com/img/490788/136105986/1/192511864/nT_xrq67c34ic841rk6d19k0vuu.mp4',  //russians
                'https://dn2.newtumbl.com/img/490788/136118118/1/192527703/nT_kdvtifjh46s9zny6yi2t97q0.mp4',
                'https://dn0.newtumbl.com/img/1191627/134915764/1/167091172/nT_eqsfu0t45vkg7zji95z74jts.gif', // xyz deep plowing
                'https://dn0.newtumbl.com/img/1283257/131400572/1/186045314/nT_9yhvv41gbq05p48j9092raye.gif',
                'https://dn3.newtumbl.com/img/973103/131403559/1/161249255/nT_5z5fga3ug7269nfbrnb48zcn.gif',
                'https://dn2.newtumbl.com/img/973103/132886878/1/188096075/nT_kgaqaqs502vkuygefzvtnjdh.gif',
                'https://dn0.newtumbl.com/img/864639/123813876/1/124837426/nT_hr0y90jk0ad06huq4fcfk31e.gif', // self lick
                'https://dn2.newtumbl.com/img/864639/126007514/1/145506536/nT_sa4rrtqcib47j4j27sg92iq3.gif',
                'https://dn1.newtumbl.com/img/864639/135602469/1/191580466/nT_yhj5u9r8cjegn6izcebdk6x1.gif',
                'https://dn3.newtumbl.com/img/864639/134787067/1/183045643/nT_tf4baatkrfuqzrff2jcdnh0u.jpg',
                'https://dn1.newtumbl.com/img/864639/134090349/1/189760252/nT_yt2f199daqzyd2fgr9fsa5s4.jpg',
                'https://dn2.newtumbl.com/img/864639/133493638/1/185149868/nT_y8t89h50ersct6sjnyahsjdt.jpg',
                'https://dn2.newtumbl.com/img/864639/132282234/1/182391695/nT_r527b9vg5bb0qsvuni5dja91.gif',
                'https://dn1.newtumbl.com/img/84927/60067513/1/75352166/nT_cfziuyev2uy8bh30y2f2hnbc.gif',
                'https://dn0.newtumbl.com/img/1183378/135657532/1/191902564/nT_z79jt5e5erc8t3qhx9irhkkp.gif',
                'https://dn3.newtumbl.com/img/67301/128837663/1/168102899/nT_r0hi1npsk1hccxv74bqepfnh.gif',
                'https://dn3.newtumbl.com/img/67301/128806271/1/173063142/nT_e1hu61abdutjkd1tkpz2f3vp.gif',
                'https://dn3.newtumbl.com/img/67301/128494999/1/174101668/nT_g23jgvxniv7x2j7ya0bdqpak.jpg',
                'https://dn3.newtumbl.com/img/490788/135817483/1/92529524/nT_zhd5g9b08128vxzggs63vqbf.jpg',
                'https://dn2.newtumbl.com/img/490788/134460902/1/51802950/nT_p01sa8d6qfiz0hndkb6ky884.jpg',
                'https://dn3.newtumbl.com/img/490788/134245031/1/122550550/nT_ynkpxksdbqn4jestfd2szsvt.jpg',
                'https://dn0.newtumbl.com/img/490788/122243444/1/170481097/nT_ciaeyiaqrgpzs7t6b4x5xreq.jpg',
                'https://dn3.newtumbl.com/img/490788/121939563/1/168477965/nT_x452t6h4apqbu97r6esv5b51.jpg'
            ],
            's4' => [
                'https://dn0.newtumbl.com/img/1283016/125920404/1/176391595/nT_9zzpfarf3j28b9yyfn01f6kp.mp4',
                'https://dn1.newtumbl.com/img/84927/126346165/1/176701053/nT_q4c37y0updr30e9y4p652866.mp4',
                'https://dn3.newtumbl.com/img/353629/132417907/1/163227731/nT_176yka75jvcdhzspv6pqut2c.mp4',
                'https://dn1.newtumbl.com/img/353629/122888625/1/156035472/nT_qbj5vev790zc2r6nhpc2fb3d.mp4',
                'https://dn2.newtumbl.com/img/490788/136113202/1/192521372/nT_147n67ny3407qrat0n4vvs04.mp4',
                'https://dn2.newtumbl.com/img/490788/136113146/1/192521263/nT_zz0e0i2r5t4fuf1qr5juf33z.mp4',
                'https://dn1.newtumbl.com/img/35946/458529/1/715405/nT_xb6ys74c1xfycpr6aiicsdab.gif',
                'https://dn0.newtumbl.com/img/1191627/133819996/1/161990280/nT_9ncb0annyktayr3yrxb5zcvb.gif', // fuck and jerk
                'https://dn1.newtumbl.com/img/1207679/132390877/2/187403298/nT_0vpppde6v2cpty602tkp1i76.gif',
                'https://dn2.newtumbl.com/img/973103/132886878/1/188096075/nT_kgaqaqs502vkuygefzvtnjdh.gif',
                'https://dn1.newtumbl.com/img/1191627/134356453/1/84068015/nT_2ifafn6z2j5qy0ss7j9kd4u3.gif',
                'https://dn1.newtumbl.com/img/973103/132149841/1/187073176/nT_tytcdf6a94xeq820beynhscp.jpg',
                'https://dn2.newtumbl.com/img/973103/132149218/1/187072169/nT_d6s9kvr7fqj7fbugzeazxr3n.gif',
                'https://dn2.newtumbl.com/img/1065907/130765110/1/185160665/nT_dibsek646br79gj6usyh5tz9.png',
                'https://dn3.newtumbl.com/img/973103/131785711/1/186570812/nT_sfy6iyzvn5ey6g6ubz90i04e.jpg',
                'https://dn2.newtumbl.com/img/84927/116052754/1/163303312/nT_kukz3rucnh6a9x8i0f53t3c3.jpg',
                'https://dn2.newtumbl.com/img/490788/87529838/1/107157365/nT_zg790dzxavt3ca7dhhf1zhg4.mp4";',
            ],
            's5' => [
                'https://dn3.newtumbl.com/img/1283016/126029927/1/178701132/nT_grvs85bvvdxq3ypt1hg8q2ej.mp4',
                'https://dn1.newtumbl.com/img/490788/136121837/1/192532604/nT_a2s9a7rfqc535ts59j6f4j8k.mp4',
                'https://dn3.newtumbl.com/img/1160933/135690055/1/191946227/nT_8y92fefsd24yzhzrhb07d77q.mp4',
                'https://dn0.newtumbl.com/img/381428/66818628/1/96080861/nT_47hd1ct5e9eqre7nusirvd30.mp4',
                'https://dn0.newtumbl.com/img/490788/43252820/1/62952166/nT_sg7n4h1hryvk1yrdafugbc26.mp4',
                'https://dn0.newtumbl.com/img/1159729/132406924/1/88876698/nT_4v9v3aj06rqr13kaxb1g4x6f.mp4',
                'https://dn0.newtumbl.com/img/1159729/130738212/1/185124753/nT_fsxcqbdctstgv0gsrh7gg4xa.mp4',
                'https://dn3.newtumbl.com/img/1159729/129452527/1/13464299/nT_ef45enjcvsnb4cdbbhszqpxp.mp4',
                'https://dn0.newtumbl.com/img/1191627/134915764/1/167091172/nT_eqsfu0t45vkg7zji95z74jts.gif',
                'https://dn0.newtumbl.com/img/1283257/131400572/1/186045314/nT_9yhvv41gbq05p48j9092raye.gif',
                'https://dn0.newtumbl.com/img/1214556/124644248/1/176827876/nT_e0yai4552g1cazp1hrudjgp2.gif',                
                'https://dn1.newtumbl.com/img/1214556/127171397/2/180274906/nT_ttku0ub8tgxchcg92vpktnv4.gif',
                'https://dn1.newtumbl.com/img/114590/34231161/1/45824896/nT_g7hnjiaa7kqd62u6z73iq2su.gif',
                'https://dn2.newtumbl.com/img/1214556/130406606/1/184672297/nT_nsrjz00nqd2pj9e7026hvafv.gif',
                'https://dn1.newtumbl.com/img/1214556/130114505/1/184269655/nT_nzan6ka3j3gt8hpii6gx8a34.gif',
                'https://dn0.newtumbl.com/img/1191627/134918628/1/186010480/nT_rk82vg4nq2e4x2ity51s3gyf.jpg',
                'https://dn0.newtumbl.com/img/1191627/134626652/1/190179937/nT_8xeztgs2itgs1d9rshg1sapn.png',
                'https://dn2.newtumbl.com/img/1214556/126248162/1/179017398/nT_7582y9it1qu72zbu21z06fi1.png',
                'https://dn2.newtumbl.com/img/1183378/136718818/1/193348316/nT_yzqiqj5vxbgedtkee6et3y6p.gif',
            ],
            
            's6' => [
            'https://dn2.newtumbl.com/img/1283257/131415022/1/186066476/nT_3kfk30p2uya2dr8i0faskqdf.mp4',
            'https://dn3.newtumbl.com/img/887398/116757459/1/158011609/nT_aiqxbzbuxq5y2ss2r7576gz8.mp4', //jo cum 6.9 secs
            'https://dn2.newtumbl.com/img/993720/135312174/1/191434663/nT_ex84yc2p1zgp9vbpn36xu7jb.mp4', // showing hole
            'https://dn1.newtumbl.com/img/450929/92976901/1/98943416/nT_3upstf5husazpvq1x4stu1yf.mp4',   // pounding close up
            'https://dn3.newtumbl.com/img/630270/24913519/1/36213349/nT_5cdhu2ucebei9zgjhi5hvp0j.gif', // hands free cum
            'https://dn1.newtumbl.com/img/475732/14853453/1/21635848/nT_v7cv43kqf54xu87fys9gs446.gif', // riding and getting jerked
            'https://dn1.newtumbl.com/img/789049/135365649/1/155572029/nT_td89b1rxja9g6t6h5idxf19y.gif', // anal close up
            'https://dn0.newtumbl.com/img/450929/118840092/1/106325102/nT_5u4dh9ux2vtf7x9c0ppcde1s.gif', // dumping load
            'https://dn1.newtumbl.com/img/450929/113355901/1/155515088/nT_xyt1jnh5y1frqha8pdcdkkbk.gif', // dump load side view
            'https://dn2.newtumbl.com/img/630270/25018082/1/36355975/nT_76eb3dbjztp5u62nbu0i1v9k.gif', // breed standing
            'https://dn3.newtumbl.com/img/887398/113883575/1/161249002/nT_945hxs0pevv2912gnkkq09rd.gif', //jo cum gif
            'https://dn1.newtumbl.com/img/887398/95655605/1/43057975/nT_ii3tsqv1x8x4bec33ckrpidp.gif', // jo cum on other guy
            'https://dn3.newtumbl.com/img/887398/83642539/1/115239750/nT_jdab1zxf2vthk5yikr9xaqhn.gif', // cum in car
            'https://dn0.newtumbl.com/img/887398/65529168/1/93168255/nT_dx4prvqrjf00gr887z36i0p3.gif', // two fb players on field breeding
            'https://dn1.newtumbl.com/img/620515/135913889/1/192252063/nT_q4a5jg6jq6dt4zu8a5f8g2vg.gif', // breeding
            'https://dn2.newtumbl.com/img/490788/136040718/1/192425732/nT_cq4fy8tkcehkc5hauenjtjz7.gif', // breeding
            'https://dn2.newtumbl.com/img/490788/136042246/1/192427476/nT_s1c2v2agd1xpe7se26d16qj3.gif', // breeding
            'https://dn2.newtumbl.com/img/490788/136044106/1/192430012/nT_j9v0rbjhax23p4b1rr5q21vi.gif', // penetration huge
            'https://dn0.newtumbl.com/img/490788/136046732/1/192433426/nT_uthz3f0gvdqfpgqh25h9jnyi.gif', // drilling
            'https://dn1.newtumbl.com/img/84927/135195325/1/190004827/nT_j40d6dfg95639eaf78fsbqy7.gif',
            'https://dn2.newtumbl.com/img/84927/134458122/1/89330090/nT_ycxdtek7and9s7fb6336gsez.gif',
            'https://dn2.newtumbl.com/img/973103/132149218/1/187072169/nT_d6s9kvr7fqj7fbugzeazxr3n.gif', // pounding
            'https://dn1.newtumbl.com/img/151666/39151365/1/52120757/nT_8300vbixjs57ntt2fpn8snfq.gif',
            'https://dn3.newtumbl.com/img/67301/128806271/1/173063142/nT_e1hu61abdutjkd1tkpz2f3vp.gif',
            'https://dn1.newtumbl.com/img/84927/131681125/1/186253094/nT_k71vk1a9irqtuxch90buugj0.gif',
            'https://dn2.newtumbl.com/img/84927/125263074/2/93083261/nT_iktbz17a9g25t8yqxci6s94i.jpg',
            'https://dn3.newtumbl.com/img/84927/121434515/1/172435745/nT_hybud3e4nkifandjd72vv03u.gif',
            'https://dn2.newtumbl.com/img/84927/120572182/2/170710011/nT_ed5t3gz9vja6avpjnghcs7rz.gif',
            'https://dn2.newtumbl.com/img/825770/55863538/1/80936354/nT_25ktuz8s7n4nfni8n6vegz2y.gif',
            'https://dn1.newtumbl.com/img/84927/129069509/1/102343942/nT_5ktnpz17iu75ky94vn2dxs9b.gif',
            'https://dn2.newtumbl.com/img/887398/119590158/1/77881925/nT_61zvde79xnvv1ad0i52gu0cj.gif',
            'https://dn2.newtumbl.com/img/84927/116592002/1/118136247/nT_k8hds33xg2hvk8r5kgqe39dj.gif',
            'https://dn2.newtumbl.com/img/825770/52135710/1/15918118/nT_nh981tkj9p2xp3ubjte4u49z.gif',
            'https://dn1.newtumbl.com/img/825770/51544925/1/69487721/nT_bhg1diyg9p4t4s5rrns1e9nt.gif',
            'https://dn2.newtumbl.com/img/825770/50298834/1/6885690/nT_kiz4v9p8nyd8hyf9ayazssry.gif',
            'https://dn1.newtumbl.com/img/825770/49508585/1/39437700/nT_5a637bgy706e80dsy67x382e.gif',
            'https://dn0.newtumbl.com/img/825770/46074220/1/59205190/nT_81z2qc9dxdxch0txgy3aj6gj.gif',
            'https://dn3.newtumbl.com/img/825770/42073051/1/61061549/nT_z88s4zir513rzdvx0b2tbpn8.jpg',
            'https://dn1.newtumbl.com/img/168315/73028009/1/75284649/nT_x76rk4iieb7dj7kdnt5tdc7n.gif',
            'https://dn1.newtumbl.com/img/168315/73027689/2/63529327/nT_3xyvrb9q4c3ffvv2g9ny9hfn.gif',
            'https://dn2.newtumbl.com/img/168315/71354054/1/90926089/nT_8urebi2ik6auubep3dc0ud3p.gif',
            'https://dn2.newtumbl.com/img/168315/58651706/1/22507069/nT_ffvk53jpygytf1hqkksritst.gif',
            'https://dn1.newtumbl.com/img/139383/101962949/1/143797062/nT_205q1y8cy1v7uz2732utuubb.gif',
            'https://dn3.newtumbl.com/img/139383/101135963/1/123728489/nT_52yvdn3phy9t71f2yc894qr2.gif',
            'https://dn2.newtumbl.com/img/139383/99987174/1/129618807/nT_757r3k03ebk1yeihj5fx3e0r.gif',
            'https://dn1.newtumbl.com/img/166040/125505957/3/178002488/nT_fr7yq9kjtetxc2tqp2yh75tx.gif',
            'https://dn1.newtumbl.com/img/76701/135297129/1/190544846/nT_8ith0rsbk1u6pys13g59zzk9.jpg',
            'https://dn0.newtumbl.com/img/76701/111834884/1/159113938/nT_tcdjqcrnea9drrucgth0r4yr.mp4',
            'https://dn0.newtumbl.com/img/76701/102479240/1/146001845/nT_c11488kvcbt5a4hq0141c241.mp4',
            'https://dn2.newtumbl.com/img/76701/102299174/1/75774379/nT_6tnqyuaavpz65x94u8zrbpdv.gif',
            'https://dn1.newtumbl.com/img/76701/102298837/1/145529864/nT_5bcvaiyg26ix4qy56bhgxep4.gif',
            'https://dn2.newtumbl.com/img/76701/102241182/1/103654992/nT_8jfjk3ztriv4jzzs5yvfhh4i.gif',
            'https://dn2.newtumbl.com/img/76701/100354198/1/142988957/nT_xu6u80xr0kujt3szdgj5d5sc.gif',
            'https://dn1.newtumbl.com/img/76701/98446773/1/140276244/nT_sxutb6eryqjxeinn897pkr9n.mp4',
            'https://dn2.newtumbl.com/img/84927/116592018/2/156334868/nT_pcqrr3rx1cz1xdkuiyu88vu2.gif',
            'https://dn0.newtumbl.com/img/84927/114894096/1/163336309/nT_aassbxn4tjdcghjfedrd59zp.gif',
            'https://dn2.newtumbl.com/img/84927/114894142/1/160658845/nT_jc4vx4dv3b1zvr5hgxc5b91s.gif',
            'https://dn1.newtumbl.com/img/84927/94189065/1/123085764/nT_3zubsnh3cny9d879tskau78v.gif',
            'https://dn2.newtumbl.com/img/84927/114691598/1/162878861/nT_4vh3fch35ft4fx90seaxhrgu.gif',
            'https://dn3.newtumbl.com/img/825770/55532115/1/78988947/nT_s3k01c8i661e7zzegij0n354.gif',
            'https://dn3.newtumbl.com/img/825770/54532643/1/13694910/nT_jdx6tzg4d9h2qfbdtfzsqq0d.gif',
            'https://dn3.newtumbl.com/img/864639/131219775/1/185789202/nT_eeykunfybpktdf34fj4k7bsu.gif',
            'https://dn2.newtumbl.com/img/864639/130435738/1/183310730/nT_yskjz0bsgay079e32f5bsizs.gif',
            'https://dn1.newtumbl.com/img/1101452/124408909/1/176500297/nT_r4nsxp0fvn4u6bqk4dpcfvka.gif',
        ],
            'circ' => [
                'https://dn2.newtumbl.com/img/138827/11599494/1/8490072/nT_u35pxgts2knn9174r4uji9qk.jpg',
                'https://dn2.newtumbl.com/img/138827/12911094/1/15290328/nT_pjxn6rhvx27sh206x9v29har.jpg',
                'https://dn1.newtumbl.com/img/138827/12911017/1/12072487/nT_1p44yrgekur8iq5nx1ncvz5b.png',
                'https://dn3.newtumbl.com/img/1275722/134491103/1/190313991/nT_y721nt08yvszc0ist9ei5cpc.jpg',
                'https://dn3.newtumbl.com/img/949468/73381723/1/105029856/nT_pyqq99ed8jxk23vrzd4p9k8a.jpg',
                'https://dn0.newtumbl.com/img/620515/134636024/1/190514847/nT_ardbcy65hrzi79vnpuhc8dn9.jpg',
                'https://dn3.newtumbl.com/img/138827/134280879/1/188915148/nT_gigkp6yph22uc126rqxet7p2.jpg',
                'https://dn1.newtumbl.com/img/138827/136793857/1/193450512/nT_59p3rvsbcu5xtik2av1z3a1x.png',
                'https://dn2.newtumbl.com/img/138827/136793910/1/193450577/nT_qupu9p4upvx6ezd9zivgdvyu.png',
                'https://dn2.newtumbl.com/img/138827/136794046/1/193450764/nT_py3yaf393ikzibxjuf74f2xs.png',
                'https://dn1.newtumbl.com/img/138827/136795637/1/193452839/nT_s7xengur1tnahfspdyz5gfbk.png',


                'https://dn0.newtumbl.com/img/943074/135916864/1/192252501/nT_59duyy6pi5zb11s2d057qu79.jpg',
                'https://dn2.newtumbl.com/img/943074/135809562/1/190484558/nT_i7auk79edr9nzkibyi5fk13p.jpg',
                'https://dn2.newtumbl.com/img/943074/135798022/1/192091808/nT_1n420kha7dq0ngf0vhn8gjv9.jpg',
                'https://dn2.newtumbl.com/img/943074/135721094/1/191987284/nT_v23x01je1x824zjynei3dsi0.png',
                'https://dn3.newtumbl.com/img/943074/135704647/1/191753865/nT_vi4xnujcjav9hhesxgjk25cs.jpg',
                'https://dn3.newtumbl.com/img/943074/135615819/1/191516638/nT_rc1kjey57tgisde3s2eux68g.jpg',
                'https://dn1.newtumbl.com/img/943074/134076613/1/189746205/nT_rt8kb4fu4ph1yr03r1uqjg7z.png',
                'https://dn0.newtumbl.com/img/943074/133970952/1/174180959/nT_ie6ttr35q4azx417sn4v4ty0.jpg',
                'https://dn2.newtumbl.com/img/943074/133509462/1/188956115/nT_cjt0iv5y7cveki466xpz4zkg.jpg',
                'https://dn1.newtumbl.com/img/1101452/135849277/1/61900841/nT_ab39n2j9xfszef4c1vr9c0e8.jpg',
                'https://dn3.newtumbl.com/img/1101452/130723687/1/181987168/nT_c5knhkgv8b3kcz77i414prp3.jpg',
                'https://dn1.newtumbl.com/img/1101452/127244541/1/169146372/nT_fzbp403c4hcj9xs62er1jdce.jpg',
                'https://dn0.newtumbl.com/img/67301/126438944/1/103960511/nT_dg0n4fb1fkr1h622eqphj2qy.mp4',
                'https://dn0.newtumbl.com/img/67301/124023872/1/122334335/nT_gqdui54q02j90u9b8r4nhd9v.png',
                'https://dn1.newtumbl.com/img/67301/123866001/1/166443661/nT_1fuqq8s1pj0u9fyvqi2733hp_300.jpg',
                'https://dn1.newtumbl.com/img/846398/55898993/1/80959677/nT_9yj0f0uctikfneyp1e4jsbpt.jpg',
                'https://dn3.newtumbl.com/img/846398/53907071/1/77842771/nT_r7dcb2id83p4p5grdsejfyi4.jpg',
                'https://dn0.newtumbl.com/img/846398/43108896/1/60825547/nT_t13qy3dada4a924yfxevgtg0.jpg',
                'https://dn0.newtumbl.com/img/846398/42745644/1/42249687/nT_4gd388xvngi6atyibevq0hja.jpg',
                'https://dn3.newtumbl.com/img/138827/134244995/1/122550550/nT_7qtyq2qxeaky1usas3a580e9.jpg',
                'https://dn2.newtumbl.com/img/138827/133985298/1/189619328/nT_qhveufkhxk0ah2cqc9f91ash.png',
                'https://dn3.newtumbl.com/img/138827/131874599/1/186690453/nT_1i7sa08z5eaeu6g2idxsruky.jpg',
                'https://dn1.newtumbl.com/img/138827/91244097/1/101091157/nT_i71izj9trg932ubukg1t9je5.jpg',
                'https://dn3.newtumbl.com/img/138827/91173239/1/130023494/nT_2zic7g0khbqas82egunjy78v.png',
                'https://dn3.newtumbl.com/img/138827/91110031/1/129935768/nT_usqs1yef99zngpr09iek3y7n.jpg',
                'https://dn0.newtumbl.com/img/138827/71003596/1/99298561/nT_red4gife22yjtxuktfih5xn0.jpg',
                'https://dn1.newtumbl.com/img/138827/56345393/1/4121089/nT_yzbin0cuxqe6vfzz08racnyj.jpg',
                'https://dn2.newtumbl.com/img/138827/51977690/1/71785682/nT_p6yzx7f3pujhxth28n89cuhh.jpg',
                'https://dn3.newtumbl.com/img/138827/46875759/1/65447379/nT_8sy91z40r4brit8dzpvqgjv6.jpg',
                'https://dn3.newtumbl.com/img/138827/46033399/1/66962833/nT_svvjxj538cnh3s74321bd864.mp4',
                'https://dn2.newtumbl.com/img/138827/43361526/1/63108650/nT_2dbaxxninugyq0958h1jgkqx.mp4',
                'https://dn2.newtumbl.com/img/138827/43142978/1/62793446/nT_nt4ue3tntsb9h9arsk21kdj8.mp4',
                'https://dn0.newtumbl.com/img/138827/33763644/1/48797879/nT_k16r4rk1dfj1s6e7j71x4xyx.jpg',
                'https://dn0.newtumbl.com/img/138827/24495892/1/9484303/nT_t5ded1vu9ynyq50x056yp910.jpg',
                'https://dn0.newtumbl.com/img/138827/24066084/1/10643442/nT_3pjr4z9ax80rxei79qipency.jpg',
                'https://dn1.newtumbl.com/img/138827/22734737/1/33147223/nT_7h7ibh0y4dujb276p9q2cd12.jpg',
                'https://dn2.newtumbl.com/img/853999/45390430/1/66048578/nT_s0iekx83413jz0r20nq256qz.jpg',
                'https://dn2.newtumbl.com/img/138827/22103110/1/32244598/nT_xjevvigd1qjxr484hucvpsze.jpg',
                'https://dn3.newtumbl.com/img/138827/18712147/1/13466270/nT_ju3pjh5un70ah2nfp8dbu9f4.jpg',
                'https://dn1.newtumbl.com/img/138827/18712101/1/12802805/nT_rsb3zr4ud8hgu3n2xc25zaq6.jpg',
                'https://dn1.newtumbl.com/img/138827/14562113/1/4329573/nT_i8nghj2bdy0p3s1xghnae7xn.jpg',
                'https://dn3.newtumbl.com/img/138827/12887663/1/4041748/nT_ciidp88vg92ztf9z3i8rka8k.jpg',
                'https://dn2.newtumbl.com/img/138827/11310706/1/6124531/nT_ihvz8bv97puhsxs606j46yct.jpg',
                'https://dn1.newtumbl.com/img/138827/11308905/1/9391688/nT_d3krjp7da6crjszaf8j6d4vt.jpg',
                'https://dn1.newtumbl.com/img/138827/11248273/1/15513262/nT_eykvnvd7d1n3ax7zcyg81d4q.jpg',
                'https://dn1.newtumbl.com/img/138827/9828089/1/14539231/nT_z4tsstnbe68exnv0tffnd9hi.png',
                'https://dn1.newtumbl.com/img/138827/5950013/1/8923958/nT_dxgcgkz098tgevsiernigik8.png',
                'https://dn1.newtumbl.com/img/138827/5949457/1/8923233/nT_4k4niu9kq995h516c3kt0q0a.jpg',
                'https://dn3.newtumbl.com/img/138827/2345111/1/3600294/nT_u1c05iqnu1z28upzax3avg27.png',
                'https://dn2.newtumbl.com/img/24227/85256250/1/121672340/nT_ktt6d8jeiqgu0sua4budd01f.mp4',
                'https://dn2.newtumbl.com/img/24227/85247194/1/121659968/nT_skic8uqdz97x8cbx5x7834zp.mp4',
                'https://dn3.newtumbl.com/img/24227/82155627/1/117166462/nT_ctz1hixbtnu1pa4zvseqzqpz.mp4',
                'https://dn3.newtumbl.com/img/412198/95568359/1/136196566/nT_dta280u4rtvdygbyuagzs2xp.jpg',
                'https://dn3.newtumbl.com/img/949468/77084291/1/110128851/nT_68brvqst5g5dq7ugjkdbikpn.jpg',

            ]
        ];

        $arr = $db[$set] ?? [];
        $content = implode("\n", $arr);
        
        $content = str_replace(' ', '', $content ?? null);


        return $content ?? '';
    }

    protected function getFlip($set)
    {
        $content = false;
        $flip = Flip::where('name', $set)->first();
        if ( $flip ) {
            $items = $flip->items;
            // dd($items);
            if ( $items ) {
                foreach ( $items as $item ) {
                    // $this->line((string)$item->content);
                    $content .= $item->content . "\n";
                }
            }
        }
        return $content;
    }
}

/*
// jo cum
'https://dn1.newtumbl.com/img/63470/135227593/1/190796598/nT_nq1isrbcvyd4zufb0xhbze59.mp4',
'https://dn1.newtumbl.com/img/63470/126764081/1/171574381/nT_b4j0gztu98008skigedxp2yu.mp4',
'https://dn3.newtumbl.com/img/63470/121023751/1/170595051/nT_e7a9spfc38bv1hphvfbnjr9t.gif',
'https://dn0.newtumbl.com/img/63470/118609832/1/160940945/nT_ttdygjsq3kr8dk85cak18cqq.mp4',
'https://dn0.newtumbl.com/img/57960/136374088/1/166173735/nT_yarv7cdygnb4pgf80n7u292c.gif',
'https://dn1.newtumbl.com/img/57960/129452109/1/141826112/nT_hfvb763ugizhkyqb2x1nydfz.mp4',
'https://dn3.newtumbl.com/img/214188/124320223/1/143177142/nT_t9jknjp4gbstvz144t75ih8i.mp4',
'https://dn0.newtumbl.com/img/324563/135691828/1/191948633/nT_jbtffzdh1crahttu5j0pfhti.gif',
'https://dn2.newtumbl.com/img/1234652/135643846/1/191883937/nT_15rf94ce139xv0gff2d0heux.mp4',
'https://dn1.newtumbl.com/img/620515/134269849/1/190007148/nT_a8urv5hcaz5gdc293pdnx9r7.mp4',
'https://dn2.newtumbl.com/img/351127/135100882/1/172544376/nT_bz53yf5s11ax3dasbg2xrzz3.mp4',
'https://dn0.newtumbl.com/img/351127/131184572/1/181257589/nT_e3s9i5n58dsy17p32tekiukx.mp4',

// jo, no cum
'https://dn3.newtumbl.com/img/63470/131554811/1/186220505/nT_880d3zq2ah0r4i9e2cqir512.gif',
'https://dn2.newtumbl.com/img/63470/117399606/1/166651351/nT_qxzks44xjtx9000tppu425e9.gif',
'https://dn1.newtumbl.com/img/351127/136004581/1/190877054/nT_frjtxq5q6ns7igphvyayjbx6.gif',
'https://dn3.newtumbl.com/img/160776/136364247/1/192862863/nT_urs67ak68hi4x9jxbx9c4jcx.mp4',
'https://dn2.newtumbl.com/img/351127/123207562/2/158750952/nT_p8ag0e2gz3048rtxeeissgbp.gif',

// play w balls, no cum
'https://dn3.newtumbl.com/img/738077/49274651/1/71587749/nT_5pkrv9yt6dqt9rjy5pa3fa9k.mp4',

// Anal
'https://dn0.newtumbl.com/img/63470/134675296/1/190557071/nT_p5hdk64495zx70r4ft2ca3nx.mp4',
'https://dn2.newtumbl.com/img/351127/134522498/1/126468222/nT_sinv7qn0k2xnzy63sybv8vkc.gif',

https://66.media.tumblr.com/83278dc85e0813f1617e88be8f8f6eb4/tumblr_pr4p66lVi91v76t7e_540.jpg
https://66.media.tumblr.com/130d6d92babe8eb7b1a4881152cadfd2/tumblr_pqyxvhRcTY1tg18vz_540.jpg

*/