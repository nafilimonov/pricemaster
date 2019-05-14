// --- Автозаполнение ---

//Опции по умолчанию
autocompleteOpt = {
	delay:10,
	minChars:2,
	matchSubset:1,
	autoFill:true,
	matchContains:1,
	cacheLength:10,
	selectFirst:true,
	formatItem:liFormat,
	maxItemsToShow:10,
};

function liFormat (row) {
	//console.log (row);
  var result = row[0];
  return result;
}

function selectItemModel(li,input) {
		if( li == null ) var sValue = 'А ничего не выбрано!';
		if( !!li.extra ) var sValue = li.extra[0];
		else var sValue = li.selectValue;
		$("#model_id").val (sValue);
		input.parent().find(".checkbox_marka_add").prop("checked", false);
		input.parent().find(".model_id").val (sValue);
}

function selectItemMarka(li,input) {
		if( li == null ) var sValue = 'А ничего не выбрано!';
		if( !!li.extra ) var sValue = li.extra[0];
		else var sValue = li.selectValue;
		$("#marka_id").val (sValue)
}

function selectItemChange(li,input) {
		if( li == null ) var sValue = 'А ничего не выбрано!';
		if( !!li.extra ) var sValue = li.extra[0];
		else var sValue = li.selectValue;
		input.parent().find(".checkbox_marka_add").prop("checked", false);
}

// --- Автозаполнение ---
function prepareAutoComplete() {
	
	var autocompleteOptModel = {};
	var autocompleteOptMarka = {};
	var autocompleteOptChange = {};
	
	$.extend(autocompleteOptModel, autocompleteOpt, {get: "q_model", onItemSelect: selectItemModel});
	$.extend(autocompleteOptMarka, autocompleteOpt, {get: "q_marka", onItemSelect: selectItemMarka});
	$.extend(autocompleteOptChange, autocompleteOpt, {get: "q_change", onItemSelect: selectItemChange});
	
	$(".js__auto-model").autocomplete("/ajax/", autocompleteOptModel);
	$(".js__auto-marka").autocomplete("/ajax/", autocompleteOptMarka);
	$(".js__auto-change").autocomplete("/ajax/", autocompleteOptChange);
}

$(function() {
	prepareAutoComplete();
});


