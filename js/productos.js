function getDescr(idDescr){
	var descr = document.getElementById('descr'+idDescr);
	var prd = document.getElementById('prd'+idDescr);
	if(prd.getAttribute('data-ctrl')=='open'){
		descr.setAttribute('style', 'display: none;');
		prd.setAttribute('data-ctrl', 'close');	
	}
	else{
		descr.setAttribute('style', 'display: block;');
		prd.setAttribute('data-ctrl', 'open');
	}
}
