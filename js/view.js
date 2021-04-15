function switchNav() {
	if($('#mainmenu').is('.collapse:not(.show)')) {
    	document.getElementById('container').style.marginLeft = '260px';
	} else {
		document.getElementById('container').style.marginLeft = '10px';
	}
}

function expandDatabases() {
	if (document.getElementById('dbs').style.display != 'block') {
		document.getElementById('dbs').style.display = 'block';
	} else {
		document.getElementById('dbs').style.display = 'none';
		document.getElementById('tables').style.display = 'none';
	}
}

function expandTables() {
	if (document.getElementById('tables').style.display != 'block') {
		document.getElementById('tables').style.display = 'block';
	} else {
		document.getElementById('tables').style.display = 'none';
	}
}