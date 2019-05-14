$(document).ready(function() {
	// Initialise the Demo with the Ctrl Click Functionality as the Default
	var selectTable = $('#selectTable tbody').finderSelect();

	// Add a hook to the highlight function so that checkboxes in the selection are also checked.
	selectTable.finderSelect('addHook','highlight:before', function(el) {
			el.find('input').prop('checked', true);
	});

	// Add a hook to the unHighlight function so that checkboxes in the selection are also unchecked.
	selectTable.finderSelect('addHook','unHighlight:before', function(el) {
			el.find('input').prop('checked', false);
	});

	// Prevent Checkboxes from being triggered twice when click on directly.
	selectTable.on("click", ":checkbox", function(e){
			e.preventDefault();
	});

	// Add Select All functionality to the checkbox in the table header row.
	$('#selectTable	').find("thead input[type='checkbox']").change(function () {
			if ($(this).is(':checked')) {
					selectTable.finderSelect('highlightAll');
			} else {
					selectTable.finderSelect('unHighlightAll');

			}
	});

	// Add a Safe Zone to show not all child elements have to be active.
	$(".safezone").on("mousedown", function(e){
			return false;
	});
});