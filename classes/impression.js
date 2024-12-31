function printDiv(){
	var contenu=document.getElementById('contenu');
	var a=window.open('','','height=1000,width=1000');
	a.document.write('<html>');
	a.document.write('<body><h1>votre code</h1><br>');
	a.document.write(contenu);
	a.document.write('</body></html>');
	a.documet.print();
}