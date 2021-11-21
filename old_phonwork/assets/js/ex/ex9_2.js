// must assume the existence of some variables (defined in exercises.js)

exerciseName = "Quantity in Icelandic";
mincorrect=30;
minrun=3;
var n=34;

var namebase="media/sounds/icelandic/";
for (var i=0; i<n; i++) {
    token = i+1;
    soundfiles[i] = namebase+"i"+token.toString();
}

var imfile = namebase + "icelandic.gif";
var imfile1 = namebase + "icelandic1.gif";
var imfile2 = namebase + "icelandic2.gif";

answer[0] = "hot fem|hot [fem sg]";  imgfiles[0] = imfile;
answer[1] = "hot neut|hot [neut]";   imgfiles[1] = imfile;
answer[2] = "free masc sg| free [masc sg]";  imgfiles[2] = imfile;
answer[3] = "free masc sg gen|free [masc sg gen]";  imgfiles[3] = imfile;
answer[4] = "sweet fem|sweet [fem]";  imgfiles[4] = imfile;
answer[5] = "sweet neut|sweet [neut]";  imgfiles[5] = imfile;
answer[6] = "wound| wound [gen pl]";  imgfiles[6] = imfile;
answer[7] = "sore|sore [gen pl]";  imgfiles[7] = imfile;
answer[8] = "sod";  imgfiles[8] = imfile;
answer[9] = "fetched";  imgfiles[9] = imfile;

answer[10] = "small pot";  imgfiles[10] = imfile1;
answer[11] = "young seal";  imgfiles[11] = imfile1;
answer[12] = "copper";  imgfiles[12] = imfile1;
answer[16] = "may";  imgfiles[16] = imfile1;
answer[17] = "distressed";  imgfiles[17] = imfile1;
answer[18] = "meet 2s|meet [2s pr sub]";  imgfiles[18] = imfile1;
answer[19] = "meet 3p|meet [3p pr ind]";  imgfiles[19] = imfile1;
answer[23] = "sinker";  imgfiles[23] = imfile1;
answer[24] = "dampness";  imgfiles[24] = imfile1;
answer[25] = "blame|to blame";  imgfiles[25] = imfile1;
answer[26] = "regret|to regret";  imgfiles[26] = imfile1;
answer[27] = "saga";  imgfiles[27] = imfile1;
answer[31] = "know|to know";  imgfiles[31] = imfile1;
answer[32] = "lay|to lay";  imgfiles[32] = imfile1;
answer[33] = "cover|to cover";  imgfiles[33] = imfile1;


answer[13] = "zeal";  imgfiles[13] = imfile2;
answer[14] = "hoax";  imgfiles[14] = imfile2;
answer[15] = "opening";  imgfiles[15] = imfile2;
answer[20] = "wide";  imgfiles[20] = imfile2;
answer[21] = "breadth";  imgfiles[21] = imfile2;
answer[22] = "bite";  imgfiles[22] = imfile2;
answer[28] = "dark";  imgfiles[28] = imfile2;
answer[29] = "dew";  imgfiles[29] = imfile2;
answer[30] = "grasps";  imgfiles[30] = imfile2;





