/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = '../../backend/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '../../backend/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = '../../backend/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = '../../backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '../../backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '../../backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
