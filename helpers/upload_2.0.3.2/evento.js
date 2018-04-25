window.addEvent('load', function() {
 
	var swiffy = new FancyUpload2($('status'), $('images-list'), {
		url: $('form_imagens').action,
		fieldName: 'photoupload',
		path: 'Swiff.Uploader.swf',
		onLoad: function() {
			$('loading').destroy();
			$('status').removeClass('hide');
			/*this.options.typeFilter = {'VirtualMachines (*.ovf, *.vmdk)': '*.ovf; *.vmdk'};*/
			this.options.typeFilter = {'ALL (*)': '*'};
		},
		/*limitFiles: 500,*/
		debug: true,
		target: 'add-image'
	});
 
	$('add-image').addEvent('click', function() {
		swiffy.browse();
		return false;
	});
 
	$('clear-list').addEvent('click', function() {
		swiffy.removeFile();
		return false;
	});
 
	$('upload-images').addEvent('click', function() {
		swiffy.upload();
		return false;
	});
 
});