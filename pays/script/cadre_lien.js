

/*
SCRIPT EDITE SUR L'EDITEUR JAVACSRIPT
http://www.editeurjavascript.com
*/
domok = document.getElementById;
if (domok)
	{
	skn = document.getElementById("topdecklink").style;
	if(navigator.appName.substring(0,3) == "Net")
		document.captureEvents(Event.MOUSEMOVE);
	document.onmousemove = get_mouse;
	}

function poplink(msg)
{

var content ="<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 BGCOLOR=#000000><TR><TD><TABLE WIDTH=100% BORDER=0 CELLPADDING=2 CELLSPACING=1><TR><TD BGCOLOR=#FF9900><FONT COLOR=#000000 SIZE=2 face='Arial'><CENTER>"+msg+"</CENTER></TD></TR></TABLE></TD></TR></TABLE>";

	if (domok)
		{
	  	document.getElementById("topdecklink").innerHTML = content;
	  	skn.visibility = "visible";
  		}
}

function get_mouse(e)
	{
	var x = (navigator.appName.substring(0,3) == "Net") ? e.pageX : event.x+document.body.scrollLeft;
	var y = (navigator.appName.substring(0,3) == "Net") ? e.pageY : event.y+document.body.scrollTop;
	skn.left = x - 60;
	skn.top = y+20;
	}

function killlink()
	{
	if (domok)
  		skn.visibility = "hidden";
	}


<!-- FIN DU SCRIPT -->