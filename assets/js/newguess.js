var canvas;
var context;

const root = 'assets/data/';
const speakers = [['JW60/', 192], ['JW61/', 144], ['JW62/', 198], ['JW63/', 210]];

var sel = [];
var options = [];
var correctIndex = -1;
var frame = 0;
var feedback_reps = 5;
var rep=0;
var stop_animation = false;
var sound;
var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
                            window.webkitRequestAnimationFrame || window.msRequestAnimationGFrame;

const wordTasks = read_csv(root + 'word_task_list.txt', '\t');
var jwdir;
var xMin;
var yMin;
var yMax;
var scale;
var palPoints;
var phaPoints;
var graph_style = 1;

function load_guess(gs) {
    canvas = document.getElementById('guess');
    context = canvas.getContext('2d');

    graph_style = gs;

    numcorrect = 0;
    numrun = 0;
    mincorrect = 12;
    minrun = 3;
    if (graph_style==2) {
	exerciseName = "Guess the word - time traces";
    } else if (graph_style==1) {
	exerciseName = "Guess the word - sagittal traces";
    }

    newWord();
    requestAnimationFrame(animate);
}

function finish() {
    if ((numcorrect >= mincorrect) && (numrun >= minrun)) {  // check for completeness               
        if (! localStorage.getItem(exerciseName)) {
	    var d = new Date();
	    localStorage.setItem(exerciseName,d);  // remember this date,time
        }               
        numcorrect=0;  // reset counters
        numrun=0;
        make_inline_png_cert(exerciseName);      // print certificate       
    }  else {
	console.log('on to next word');
	number=-1
        newWord();   // do another question
	stop_animation = false;
        requestAnimationFrame(animate);   
    }
}

function process_button_click(number) {
    if (number == correctIndex) {   // got it correct
	rep = 0;
	stop_animation = true;

	numcorrect = numcorrect +1;
        document.getElementById('correct').innerHTML = numcorrect+"/"+mincorrect;
        numrun = numrun+1;
        document.getElementById('run').innerHTML = numrun+"/"+minrun;

	console.log('calling sync');
	requestAnimationFrame(sync);  // play the synchronized sound

    } else {
	numrun=0;
        document.getElementById('run').innerHTML = numrun+"/"+minrun;
	id = "b"+number;
	document.getElementById(id).style.background='red';
    }
}

function animate(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    if (graph_style==1) {drawPalPha();}
//    else if (graph_style==2) { draw_box(); }

    if (15 <= frame && frame < 15 + sel.length){
	drawMoving(sel,frame - 15);
    }
    if (frame++ >= sel.length + 30){
	frame = 0;
    }
    if (!stop_animation) {requestAnimationFrame(animate);}
}

function sync(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    if (graph_style==1) { drawPalPha(); }

    if (frame == 15){ sound.play(); }

    var drawFrame = Math.round((frame - 15) * (8 / 3));
    if (0 <= drawFrame && drawFrame < sel.length){
	drawMoving(sel,drawFrame);
    }
    if (frame++ >= (sel.length * 3 / 8) + 30){  // end of file
	sound.currentTime = sel[0][0] / 1000000;
	frame = 0;
	sound.pause();
	rep++;
	console.log('rep is: '+rep);
    }
    if (rep < feedback_reps) { 
	requestAnimationFrame(sync);
    } else {
	finish();
    }
}


function getText(url){
    var text;
    $.get({
	url: url,
	success: function(data){
	    text = data;
	},
	dataType: 'text',
	async: false
    });
    return text;
}

function read_csv(csv, sep){
    var raw = getText(csv);
    return $.csv.toArrays(raw, {'separator': sep});
}

function getColumn(arr, col){
    return arr.map(function(row){
	return row[col];
    });
}

function stringsToInts(strings){
    return strings.map(function(row){
	return row.map(function(value){
	    return parseInt(value);
	})
    });
}

function changeBasis(point){
    return [scale * (point[0] - xMin) + 20, scale * (yMax - point[1]) + 20];
}

function draw_box() {
    h = canvas.height-2;
    w = canvas.width-2;
    context.rect(1,1,w,h);
    context.strokeStyle = 'black';
    context.stroke();
}
function drawLine(line, color){
    context.beginPath();
    context.strokeStyle = color;
    context.moveTo(...line[0])
    for (i = 1; i < line.length; i++){
	context.lineTo(...line[i]);
    }
    context.stroke();
}

function drawPoints(points, color, radius){
    points.map(function(point){
	context.beginPath();
	context.fillStyle = color;
	context.arc(point[0], point[1], radius, 0, 2 * Math.PI);
	context.fill();
    });
}

function drawPalPha(){
    drawLine(palPoints, 'black');
    drawLine(phaPoints, 'black');
}

function drawMoving(sel,frame){
    if (graph_style==1) {
	var row = sel[frame];
	var paired = [];
	for (i = 1; i < row.length - 1; i += 2){
	    paired.push([row[i], row[i + 1]]);
	}
	
	var lips = [changeBasis(paired[0]), changeBasis(paired[1])];
	var tongue = [changeBasis(paired[2]), changeBasis(paired[3]), changeBasis(paired[4]), changeBasis(paired[5])];
	var jaw = [changeBasis(paired[6]), changeBasis(paired[7])];
	
	drawLine(tongue, 'blue');
	drawLine(jaw, 'red');
	drawPoints(tongue, 'blue', 3);
	drawPoints(jaw, 'red', 3);
	drawPoints(lips, 'green', 3);
    } else if (graph_style==2 & frame > 0) {

	px_frame = canvas.width/sel.length;
	px_y = (canvas.height*0.75)/(yMax-yMin);

	var LL = [];
	var TT = [];
	var TB = [];
	var JW = [];
	var LLy = sel.map(function(value,index) { return value[4]; });
	var TTy = sel.map(function(value,index) { return value[6]; });
	var TBy = sel.map(function(value,index) { return value[12]; });
	var JWy = sel.map(function(value,index) { return value[14]; });
	for (i=0; i<frame; i++) {
	    lip_relative = LLy[i] - JWy[i];
	    LL.push([i*px_frame,(yMax-lip_relative)*px_y]);
	    TT.push([i*px_frame,(yMax-TTy[i])*px_y]);
	    TB.push([i*px_frame,(yMax-TBy[i])*px_y]);
	}
	drawLine(LL,'green');
	drawLine(TT,'blue');
	drawLine(TB,'red');
    }
}

function randomElement(arr){
	return arr[Math.floor(Math.random() * arr.length)];
}

function newWord(){
    newSpeaker();
    var repeat = true;
    while (repeat){
	var rand = randomElement(wordTasks);
	var word = rand[0];
	var task = rand[1];

	var txy = stringsToInts(read_csv(root + jwdir + task + '.txy', '\t'));
	var tg = getText(root + jwdir + task + '.TextGrid');

	var times = wordToTimes(word, tg);
	if (times[0] >= 0 && times[1] >= 0){
	    repeat = false;
	    sel = [];
	    for (i = 0; i < txy.length; i++) {
		var row = txy[i];
		var secs = row[0] / 1000000;
		if (times[0] - .10 < secs && secs < times[1] + .10){
		    if (row.indexOf(1000000) != -1){
			repeat = true;
		    } else {
			sel.push(row);
		    }
		}
	    }
	}
    }
    //duration = times[1]-times[0];
    //period = duration/sel.length;
    //console.log("number of frames = "+sel.length + " duration = " + duration + " period = " + period);
    makeOptions(word);
    newSound(task);
}

function newSound(task){
    sound = document.createElement('AUDIO');
    var soundname = root + jwdir + task;

    if (sound != null && sound.canPlayType && sound.canPlayType("audio/wav")) {
        sound.setAttribute('src',soundname+".wav");
        sound.load();
    } else if (sound!= null && sound.canPlayType && sound.canPlayType("audio/mpeg")) {
        sound.setAttribute('src',soundname+".mp3");
        sound.load();
    }
}

function wordToTimes(word, tg){
    var timeList = [];
    var lines = tg.split('\n');
    for (i = 2; i < lines.length; i++) {
	if (lines[i].includes('text') && lines[i].includes('\"' + word.toUpperCase() + '\"')){
	    var t1Line = lines[i - 2].replace(/\s+/, '').split('=');
	    var t1 = parseFloat(t1Line[t1Line.length - 1]);
	    var t2Line = lines[i - 1].replace(/\s+/, '').split('=');
	    var t2 = parseFloat(t2Line[t2Line.length - 1]);
	    timeList.push([t1, t2]);
	}
    }
    if (timeList.length > 0){
	return randomElement(timeList);
    } else {
	return [-1, -1];
    }
}

function makeOptions(word){
    options = [];
    options.push(word);
    while (options.length < 4){
	var randWord = randomElement(wordTasks)[0];
	if (options.indexOf(randWord) == -1){
	    options.push(randWord);
	}
    }
    shuffleArray(options);
    correctIndex = options.indexOf(word);

    for (var i = 0; i < 4; i++) {  // put the word labels on the buttons
	id = "b"+i;
	document.getElementById(id).style.background='white';
	document.getElementById(id).value = options[i];
    }
}

function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
}


function newSpeaker(){
    randSpeaker = randomElement(speakers);
    jwdir = randSpeaker[0];
    console.log('the new speaker is '+jwdir);
    var pal = stringsToInts(read_csv(root + jwdir + 'PAL.csv', ','));
    var pha = stringsToInts(read_csv(root + jwdir + 'PHA.csv', ','));

    xMin = Math.min(...getColumn(pha, 0));
    yMin = Math.min(...getColumn(pha, 1));
    yMax = Math.max(...getColumn(pal, 1).concat(getColumn(pha, 1)));
    scale = randSpeaker[1] / (yMax - yMin);

    console.log("yMin = " + yMin + " yMax = " + yMax + " scale = " + scale);

    palPoints = pal.map(changeBasis);
    phaPoints = pha.map(changeBasis);
}

