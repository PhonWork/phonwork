var index=-1;
var numcorrect=0;
var numrun=0;
var exerciseName = "";
var mincorrect=1;
var minrun=1;
var quest = new Array();
var answer = new Array();
var order = new Array();
var soundfiles = new Array();
var soundfiles2 = new Array();
var imgfiles = new Array();
var vidfiles = new Array();
var debug = 0;

// this function excapes special characters
RegExp.quote = function(str) { return (str+'').replace(/[.?*+^$[\]\\(){}-]/g, "\\$&");  };
// this functions makes "or" in regular expressions more readable to users (assume quotes).
RegExp.or = function(str) { return (str+'').replace(/\|/g,"\" or \""); };

function initialize(rand=1) {
    // shuffle the order of the questions
    for (var i=0;i<answer.length;i++) { order[i]=i; }
    // the default is to randomize the order, pass rand!=1 for sequential order
    if (rand==1) {         
	for (i=answer.length-1; i>0; i--) { 
	    var r = Math.floor(Math.random()*i);
	    var temp = order[i];
	    order[i] = order[r];
	    order[r]= temp; 
	}
    }
    // ask the first question
    ask_question();
}

function init_practice(rand=1) {
    // shuffle the order of the questions
    for (var i=0;i<quest.length;i++) { order[i]=i; }
    if (rand==1) {
	for (i=quest.length-1; i>0; i--) { 
	    var r = Math.floor(Math.random()*i);
	    var temp = order[i];
	    order[i] = order[r];
	    order[r]= temp; 
	}
    }
    // ask the first question
    show_practice_item();
}

function ask_question() {
    index = index+1;  
    if (index >= order.length) { index = 0; }
    if (document.getElementById('answerbox')) {
	document.getElementById('answerbox').value = "";
	document.getElementById('answerbox').focus();
    }
    if (document.getElementById('feedback')) {
	document.getElementById('feedback').style.backgroundColor = "lightyellow";
	document.getElementById('feedback').innerHTML = "";
    }
    // remove example text, element 'example'
    if (document.getElementById('example')) {
	document.getElementById('example').innerHTML="";
    }

    // --------------------- text question ---------------------------
    // the question is text in quest[], element 'question'
    if (document.getElementById('question')) {
	document.getElementById('question').innerHTML = quest[order[index]];
    }

    //--------------------- video question ---------------------------------
    // the questions are different videos in vidfiles[], element 'video_here'
    //  we show the poster (in imgfiles[]) and give a 'playback button in html
    if (document.getElementById('video_here')) {
	var element = document.getElementById('video_example');
	if (element) {
	    document.getElementById('video_here').removeChild(element);
	}
	var vid = document.createElement('video');
	vid.setAttribute('poster', imgfiles[order[index]]);
	vid.setAttribute('id','video_example');
	vid.addEventListener('ended',function(){  // show the poster after playback
	    vid.load();     
	},false);
	if (vid != null && vid.canPlayType && vid.canPlayType("video/mp4")) {
	    vid.setAttribute('src',vidfiles[order[index]]+".mp4");
	    vid.setAttribute('type','video/mp4');
	    vid.load();
	} else if (vid!= null && vid.canPlayType && vid.canPlayType("video/ogg")) {
	    vid.setAttribute('src',vidfiles[order[index]]+".ogg");
	    vid.setAttribute('type','video/ogg');
	    vid.load();
	}
	document.getElementById('video_here').appendChild(vid);
    }

    // ----------------- audio question --------------------------
    // the question has audio in soundfiles[], element 'audio_questions'
    if (document.getElementById('audio_questions')) {
	var element = document.getElementById('theaudio');
	if (element) {
	    document.body.removeChild(element);
	}
	var aud = document.createElement('audio');
	aud.setAttribute('id','theaudio');
	if (aud != null && aud.canPlayType && aud.canPlayType("audio/wav")) {
	    aud.setAttribute('src',soundfiles[order[index]]+".wav");
	    aud.load();
	} else if (aud!= null && aud.canPlayType && aud.canPlayType("audio/mpeg")) {
	    aud.setAttribute('src',soundfiles[order[index]]+".mp3");
	    aud.load();
	}
	document.body.appendChild(aud);
	document.getElementById('theaudio').play();
    }

    // -------------------- image question -----------------------------
    // the question is an image in imgfiles[], element "image_question'
    if (document.getElementById('image_question')) {
	if (debug) {
	    console.log("now showing "+imgfiles[order[index]]);
	}
	img=document.getElementById('image_question');
	img.setAttribute('src',imgfiles[order[index]]);
    }

    if (document.getElementById('answerbox')) {
	document.getElementById('answerbox').disabled = false;  // accept answers now
    }
}

function show_practice_item(){
    index = index + 1;
    if (index>=order.length) {index=0;}

    document.getElementById('practice_item').innerHTML = quest[order[index]];
    document.getElementById('run').innerHTML = numrun+"/"+minrun;

}

function check_answer() {
    var myanswer = document.getElementById('answerbox').value;
    var feedback_time = 0;

    document.getElementById('answerbox').disabled = true;  // don't accept more answers 

    if (document.getElementById('example')) {
	document.getElementById('example').innerHTML=example[order[index]];
    }

    if (document.getElementById('audio_answers')) {  // if the answers have audio
	var element = document.getElementById('theansweraudio');
	if (element) {
	    document.body.removeChild(element);
	}
	var aud = document.createElement('audio');
	aud.setAttribute('id','theansweraudio');
	if (aud != null && aud.canPlayType && aud.canPlayType("audio/wav")) {
	    aud.setAttribute('src',soundfiles2[order[index]]+".wav");
	    aud.load();
	} else if (aud!= null && aud.canPlayType && aud.canPlayType("audio/mpeg")) {
	    aud.setAttribute('src',soundfiles2[order[index]]+".mp3");
	    aud.load();
	}
	document.body.appendChild(aud);
	document.getElementById('theansweraudio').play();
	feedback_time += 1000;
    }

    var ans = new RegExp('^'+RegExp.quote(answer[order[index]])+'$',"i");
    if (ans.test(myanswer)) {	
	document.getElementById('feedback').innerHTML = "correct";
	numcorrect = numcorrect +1;
	document.getElementById('correct').innerHTML = numcorrect+"/"+mincorrect;
	numrun = numrun+1;
	document.getElementById('run').innerHTML = numrun+"/"+minrun;
	feedback_time += 1500;
    } else {
	document.getElementById('feedback').style.backgroundColor = "lavenderblush";
	document.getElementById('feedback').innerHTML = "Sorry: the answer was \""+RegExp.or(answer[order[index]]) + "\"";
	numrun=0; 
	index = index-1;  // do the same one over again
	document.getElementById('run').innerHTML = numrun+"/"+minrun;
	feedback_time += 3500;
    }

    window.setTimeout(finish,feedback_time);  // show feedback, then on to the next question
}

function check_mc_answer(id) {
    var myanswer = document.getElementById(id).value;
    var feedback_time = 0;
    
    if (myanswer == answer[order[index]]) {
	document.getElementById('feedback').innerHTML = "correct";
        numcorrect = numcorrect +1;
        document.getElementById('correct').innerHTML = numcorrect+"/"+mincorrect;
        numrun = numrun+1;
        document.getElementById('run').innerHTML = numrun+"/"+minrun;
        feedback_time += 1500;
    } else {
        document.getElementById('feedback').style.backgroundColor = "lavenderblush";
        document.getElementById('feedback').innerHTML = "Sorry: the answer was \""+ answer[order[index]] + "\"";
        numrun=0;
        index = index-1;  // do the same one over again                                                                             
        document.getElementById('run').innerHTML = numrun+"/"+minrun;
        feedback_time += 3500;
    }

    window.setTimeout(finish,feedback_time);  // show feedback, then on to the next question
}

function play_audio_example() {
    var element = document.getElementById('audio_example');
    if (element) {
	document.body.removeChild(element);
    }
    var aud = document.createElement('audio');
    aud.setAttribute('id','audio_example');
    if (aud != null && aud.canPlayType && aud.canPlayType("audio/wav")) {
	aud.setAttribute('src',soundfiles2[order[index]]+".wav");
	aud.load();
    } else if (aud!= null && aud.canPlayType && aud.canPlayType("audio/mpeg")) {
	aud.setAttribute('src',soundfiles2[order[index]]+".mp3");
	aud.load();
    }
    document.body.appendChild(aud);
    document.getElementById('audio_example').play();
}

function play_video_example() {
    var element = document.getElementById('video_example');
    element.play();
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
	ask_question();   // do another question
    }
}

function next_practice() {
    if (numrun >= minrun) {  // check for completeness
	if (! localStorage.getItem(exerciseName)) {
	    var d = new Date();
	    localStorage.setItem(exerciseName,d);  // remember this date,time
	}
	numrun=0;
	make_inline_png_cert(exerciseName);      // print certificate
    }  else {
	numrun = numrun + 1;
	show_practice_item();   // do another question
    }
}

function make_png_cert( exname ) {
    var d = localStorage.getItem(exname);

    if (d) {
	var mycanvas = document.createElement('canvas');
	mycanvas.setAttribute('width','452');
	mycanvas.setAttribute('height','140');
	var context = mycanvas.getContext('2d');

	image1 = new Image();    
	image1.addEventListener('load',function () {
	    context.drawImage(image1,1,1);
	    context.font="12pt Times";
	    context.fillText("This certifies that you completed exercise: ", 20, 80);
	    context.fillText("'"+exname+"'",20,100)
	    context.font="10pt";
	    context.fillText("Completion time: "+d, 20,120);
	    context.strokeRect(2,2,450,138);
	    
	    var url = mycanvas.toDataURL();  // make png in-line url
	    
	    // arg IE9 makes this harder than it has to be
//	    var win = window.open();  // open a new window
//	    win.document.write("<html><body></body></html>");
//	    var newImg = win.document.createElement("img");  // add an image
//	    newImg.src = url;                                // contents of image is our png
//	    win.document.body.appendChild(newImg);
	    win = window.open(url);   // if there were no IE this would be all you need
	    if (!win || win.closed || typeof win.closed=='undefined') {
		alert("pop-up blocker is enabled.  Please add this site to your exception list.");
	    }
	},false);
        image1.src = "media/images/bg_snippet.png";
	return true;
    } else {
	return false;
    }
}

function make_inline_png_cert( exname ) {
    var d = localStorage.getItem(exname);

    if (d) {
	var mycanvas = document.createElement('canvas');
	mycanvas.setAttribute('width','452');
	mycanvas.setAttribute('height','140');

	var context = mycanvas.getContext('2d');

	image1 = new Image();
	image1.addEventListener('load',function () {
	    context.drawImage(image1,1,1);
	    context.font="12pt Times";
	    context.fillText("This certifies that you completed exercise: ", 20, 80);
	    context.fillText("'"+exname+"'",20,100)
	    context.font="10pt";
	    context.fillText(d, 20,120);
	    context.strokeRect(2,2,450,138);

	    var url = mycanvas.toDataURL("image/pdf");  // make png in-line url
	    document.getElementById("feedback").innerHTML="Right click the certificate below to view or save it";
	    $('#main').append($('<img/>', {src: url}));
	},false);
	image1.src = "media/images/bg_snippet.png";

	return true;
    } else {
	return false;
    }
}
