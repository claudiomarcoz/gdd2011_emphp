<?php
$metodos = new stdClass();
$metodos->canivete = array(
'dic' => function($string,array $dic)
{
    if(is_array($string))
    {
        $string= implode(" ",$string);
    }
    return array_unique(explode(" ", strtr($string,$dic['from'],$dic['to'])));	
},
'ordenar' => function ($texto,$alfabeto,$alfabeto_padrao,$dic)
{
    $sorteado = $dic($texto,array('from'=>$alfabeto,'to'=>$alfabeto_padrao));
    sort($sorteado);
    $ordenado=implode(" ",$dic($sorteado,array('to'=>$alfabeto,'from'=>$alfabeto_padrao)));
    return $ordenado;
},
'numeros' => function($texto,$alfabeto,$alfabeto_padrao,$dic,$fator,$div)	
{
    $num = $dic($texto,array('from'=>$alfabeto,'to'=>$alfabeto_padrao));
    $resposta = array_map(function($value) use($fator,$div){ $numero = (double) base_convert( strrev($value), 20, 10); if(($numero >= $fator) and (fmod($numero,$div) <= 0 )){ return $numero; } },$num);		
    return count(array_filter($resposta));
},);
class carregar{
    private $canivete,$texto_original,$alfabeto_googol,$alfabeto_romano,$fatorMinBeleza,$divisorBeleza;
    public static function __init(stdClass $apoio,$texto,$alfabeto,$fator,$div)
    {
    return new self($apoio,$texto,$alfabeto,$fator,$div);
    }
    public function __construct(stdClass $apoio,$texto,$alfabeto,$fator,$div)
    {
    $this->canivete=$apoio->canivete;
    $this->texto_original=$texto; 
    $this->alfabeto_googol=$alfabeto;
    $this->fatorMinBeleza=$fator;
    $this->divisorBeleza=$div;
    $this->alfabeto_romano='abcdefghijklmnopqrstuvxyz';
    return $this;
    }
    public function carrega()
   {
    $order = $this->canivete['ordenar']($this->texto_original,$this->alfabeto_googol,$this->alfabeto_romano,$this->canivete['dic']);
    echo $order;
    echo "\n\n  esse foi o texto ordenado e agora:\n ",$this->canivete['numeros']($order,$this->alfabeto_googol,'0123456789'.$this->alfabeto_romano,$this->canivete['dic'],$this->fatorMinBeleza,$this->divisorBeleza ),"\n os numeros";
    }	 
}
carregar::__init($metodos,str_replace("\n",'',carrega_texto::$texto),'dcxkjsmvrlgftwpqznbh',875106,4)->carrega();          
class carrega_texto{
public static $texto=<<<EOA
fwkp cxlzh pbzkzz vgpkhp gwpw zggswp xnwm dhxhxs rjgdpwg zfwbqf lvxk rtrxmn ljz flmjks ssgcff wkgsjfjg rfz 
lfxn vwl jtf zcgtn qfqk crtfv hdlhx bxts cqqwf xnz wjrbkvx cxxwbj ktrpdnvg stlwv mkkkg gfrttnc rwmtlcgx tmlxw 
grrfzjdc gzsjbl ljgh fmq jgslrqgl crnt dzztc dhmlmx pjwhmzrb nsttfp wbqnsz kgpv bpglstfp xtlsgrnz qntwgqf vxhmj 
wjmgvjw bcxkx rtxhtwjk mmxvb mnzz bgp tcvhvk swqgwn tpt csm gzrprs xsd svsqdjn dtfbdxs rxc ctgs hcsdlxs bkqj 
rkz hpcf npw kbkk pdg zxcph qcjkmpm xbhjz dcr gdtkvl vstwzmz lmctnhvw pzj gkgxqcg jlrcjfxt vbvw xccx gcl lmnbh 
zncnwz jbqqt sff grdfmq ppdl wvfr rzd xvv mzgkk cqtkm chszh grvjwcgn wtdkw xkn xnvqkp zwxs ljnjgcvj rdbchr vxrrc 
hfwsz nqt wsmmdk vxzwvrzq rvtnzpmv pfpq pwxrw hzdhcz rvts wmnxmh gjr mvrxpz bzsbfn hsr llnxhl rdqzhbxn prczfgdv 
csdsf qzzmqgp wzhdj sdnts mkrgqr xvvjf jgs hrdbrj pxszszp mjjzb pxlcqp bmrjjs kstmxqm nltp vfbkpnl ccgrxc xlhdd 
xgsm khkttd jlhzkkc lfwhmqp pxdqjxsh bjmlgnfh kfl zjvmq wqtb fwx rwtznp gjpw nvmx wfx sntbbjg nbq rkpjgx pcml 
vvh khkfqx hmlccvl stbblb czt pql gsnmvrvt fdrxzkw gzb dfw srhpgsjg hfxjfqb vjwdmdtv wffb kwqxp sxlf qzfjc hss 
rzzcbvg zrvmhqvp lnmx wfbt jvjhm xmmwr hwb grz mzltffc mnwx zhckw dhxpf dkgvm vsl pcxhlqmv vpwdstmp fxjtrrw vvqv 
dgrscjmt ffkf qnkqn rppnvdd cvtrbq xrmn ktgb svj kkwqln lhrhkb qbjhjmx xvxcbbsc wvnt znxd dpl jkxb tlwc smrsmwvx 
ltsjd hvtrwhf lrf wwmbjbl xwwk bmqnl xxnjnzd cwvhx rxggdmcp mrqhjp lkmqjg chqnztk lpvjtl dmcb xlfvx zpgtdfkf ptbtgdj 
dsbl sghdnv gszq dgq fndf cjcjh rldsf fwjrrrxl rxcs tnmshg psfjs kfft kqxtnt hgf mxkkl lldwtfqr hzbnb flj htqlrvzm 
lcr rsmfxgm fmncl hlmjr qshfhtl bcvmdnbr qvvvd sqwsvzl ftscmjsf mwkddmwn ffjm hslpw mlmkj vlbkp tgfg xsqms bvbln 
sdcrstgl ljw bzxpt hlb zhkzr bfmhlcd gjbtkb msmjpx mxwp dlrzctzm hclr vgsk hgxfxcmg bkh jrqzh wlrcgxxm kqtpcfd rtxzvqf 
llqhm vppvmc tmxsgnsj kqrnx tsdlcxnx chcnzfg dnf vxjd xdlxdcjz fvjndb tqsfmdh cggdz sjlkqxwf tczrzmn pmhcxqtv qrlpsc 
jwfdtxcp wfbnwrk fjt njtzt hwzvpvx fqdpsv wjg qvgxfmmk sldn nmvplk smnbmsfm cbvcsjj npghjddw bxbhjfjx ccpfdqx kcrccmfr 
nglzt sjdllsz dkk dpmqvj wkd kgpjvg ckmmkc ptzk ntpw kzpgqlrk nrlxb pmbfvnhw cvhvr cvqmtj gmtpprwm lwvddwfk qbqx gdn bmrrwdk 
lnglzfk qmdsccfz ddbxbpj jrjrlknp wgvh tcd cbhvgp drpz bcl crh nsbcqv gwdr lpnxgzwd shnd rffqg krhxcxql vmw kqzf pxkclht lgbbddd 
hvqdmrjr thgvzsmq knsw vcfnbm vnwb mbrkbt xfjl dclrh sbdvkg xxz pmjzlx zshzfslz dqb qgg njxtd cljtsl cfchlpl szfpnsj cpsbqpcx 
drmjm hfzvbgx lfndmtx sxb fpmjv hhxpx jjtsxfwd tstlf ptxvvtk lkrlrwcs jfpsqx dth zvcqvgv gxjthhc wjrptcf smck bjtwkl 
sbxtbdp qnkm cmzq wrwkkkq bpmcd gpzvv xzlkln jrp wpt smqpzr wtdk bwvs jxg cst wrnk tdpxq xxdbdzcc kfswx grpjch svjnnh 
ncdvrvtn dgqg bmnjcp lhx bgj whrrj xfgsvgt vpmpnb pnlqpzd xvhrtp wwwcvgw gcb pmkrf rfzthjpn qwlnssn vdm hhhk vzhznghb 
tzhw dtbb wzkdhrpg mbt kgkpxz bdnjn gxpwmvtq rkhq rtwtcww wzvq xmr jjpdft mdq gmxnzt dgcsmlgb qtwmqgdb dlw mnq jmcgqqf 
mcjhb nqmtq ptr gbzcvmrw mdkgtq xtjxzwf zqtfjzdt dxw zvmsd rfsppg tlswss lfdbcd fwwkw mqkhvwq sqksrz mzbx vhnpcqb hdh 
vzpmq hqlfvjdj kprhfmd vnwmvdt bxjwdjv hnc mnbkngg bplcm vhxct vppptmg jplqsq zvxdgjnh lkxwwg zzrtjnn tvjlg lshpnb csnl 
fbng xqcd cff hqzn mbklxsbz sgjts pkbdgds khsxwrkz jqwklmch hgdx kwk qqb kzgmlxw nmpb vmpsqkh hrc hrlkpd flqrslr sxctxfkh 
dzh dbtnhf mtfxggk knww zsjpf fdgcmfhl zhrb jxqhtksl dswwbkgk tcdqwh wbwsgqs rfcmv rwfj lts dnwzzw tjpvsr cbvbtzsp mnmhnkpd 
mksxqjdh bznx mfcldzk rsqdpwg hpqlbqm qntkf xxgjw tpdxpj thll sqsgbjlc pmjbrnf glnlcs rxfbkc lsgwhgv vqkjwksd lqbbxk 
sddzcmjk mrbdhf qdpj dttgxb hjz mxblmt ntsdmc vmbnnmbs vfz qwtj jtllmwj shpbpcf lrglxfd ttlphm hpsll gsqnr gpsq vfbqhjdx 
szhxfxlk hmbxpwt ljpnhnq hbsv dzlwb gbnxh pjr nbrldqs cpd cxmjtx hgvvzl dplr kwb snfs sntt vkkjhcvw bmqtjhqz lwqfsfg gthdm 
phh drfwn pmcp rhx jwzzwcg xzzmrmz vzmfzcl nzs sdvtdxnl hxlktxf rqc vjmc fhpvpbq vmlgqgpp bfkzzkjw qrz mfmxdpwq rhqgvrx 
wmv thtgt mffwd kjll spc bbd mdjnthsg hzk pqlkbpz
EOA;
}
