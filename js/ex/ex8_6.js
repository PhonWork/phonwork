// must assume the existence of some variables (defined in exercises.js)

exerciseName = "Complex sounds: spectrogram reading";
minrun=20;
debug=1;

var russia_base="sounds/russian/r";
var arabic_base="sounds/arabic/a";
var chinatec_base="sounds/chinatec/c";
var bura_base="sounds/bura/b";
var ibibio_base="sounds/ibibio/i";

soundfiles2[0]=arabic_base+"1";     quest[0]="a) [tiːn] or b) [tˤiːn]";  answer[0] = "a";
soundfiles2[1]=arabic_base+"2";     quest[1]="a) [tiːn] or b) [tˤiːn]";  answer[1] = "b";
soundfiles2[2]=arabic_base+"7";     quest[2]="a) [dal] or b) [dˤal]";  answer[2] = "a";
soundfiles2[3]=arabic_base+"8";     quest[3]="a) [dal] or b) [dˤal]"; answer[3] = "b";
soundfiles2[4]=arabic_base+"13";     quest[4]="a) [suːs] or b) [sˤuːsˤ]"; answer[4]="a";
soundfiles2[5]=arabic_base+"14";     quest[5]="a) [suːs] or b) [sˤuːsˤ]"; answer[5]="b";

soundfiles2[6]=russia_base+"21";     quest[6]="a) [nos] or b) [nʲos]"; answer[6]="a";
soundfiles2[7]=russia_base+"22";     quest[7]="a) [nos] or b) [nʲos]"; answer[7]="b";
soundfiles2[8]=russia_base+"15";     quest[8]="a) [sok] or b) [sʲok]"; answer[8]="a";
soundfiles2[9]=russia_base+"16";     quest[9]="a) [sok] or b) [sʲok]"; answer[9]="b";
soundfiles2[10]=russia_base+"7";     quest[10]="a) [doma] or b) [dʲomə]"; answer[10]="a";
soundfiles2[11]=russia_base+"8";     quest[11]="a) [doma] or b) [dʲomə]"; answer[11]="b";
soundfiles2[12]=russia_base+"17";     quest[12]="a) [zof] or b)[zʲof]"; answer[12]="a";
soundfiles2[13]=russia_base+"18";     quest[13]="a) [zof] or b)[zʲof]"; answer[13]="b";
soundfiles2[14]=russia_base+"3";     quest[14]="a) [bɨl] or b) [bʲil]"; answer[14]="a";
soundfiles2[15]=russia_base+"4";     quest[15]="a) [bɨl] or b) [bʲil]"; answer[15]="b";


soundfiles2[16]=bura_base+"12";     quest[16]="a) [gàm] or b) [gʷàr]"; answer[16]="a";
soundfiles2[17]=bura_base+"16";     quest[17]="a) [gàm] or b) [gʷàr]"; answer[17]="b";
soundfiles2[18]=bura_base+"18";     quest[18]="a) [kálá] or b) [kʷárá]"; answer[18]="a";
soundfiles2[19]=bura_base+"19";     quest[19]="a) [kálá] or b) [kʷárá]"; answer[19]="b";

soundfiles2[20]=ibibio_base+"5";     quest[20]="a) [ákù] or b) [àk͡pà]"; answer[20]="a";
soundfiles2[21]=ibibio_base+"6";     quest[21]="a) [ákù] or b) [àk͡pà]"; answer[21]="b";

for (var i=0;i<quest.length; i++) {
    imgfiles[i] = soundfiles2[i] + ".png";
}




