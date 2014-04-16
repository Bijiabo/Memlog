jQuery(function($){
		var searchsite = { baidu:["http://news.baidu.com/s", "word", "\u767e\u5ea6", "http://news.baidu.com/s", "cl:2;rn:20;tn:news;ie:gbk"],
						   google:["http://www.google.com.hk/search", "q", "\u8c37\u6b4c", "http://news.google.com/", "client:aff-360daohang;hl:zh-CN;ie:gbk;newwindow:1;tbm:nws"]};
		var topSearchIcon = "search-icon";
		var topIconLink = "search-link";
		var formId = "search-form";
		var searchTextId = "search-text";
		var hideInputId = "hide-input";
		
		function setSearch(siteName){
			var searchType = searchsite[siteName];
			$("#" + topSearchIcon).attr("class","search-logo "+siteName);
			$("#" + topIconLink).attr("href",searchType[3]);
			$("#" + formId).attr("action",searchType[0]);
			$("#" + searchTextId).attr("name",searchType[1]);
			
			var hideInput = searchType[4];
			var hideInputNum = hideInput.split(";");
			var hideInputHtml = "";
			for(var i=0; i<hideInputNum.length; i++){
				var hideName = hideInputNum[i].split(":");
				var input = "<input type='hidden' id='"+hideName[0]+"' name='"+hideName[0]+"' value='"+hideName[1]+"'>";
				hideInputHtml += input;
			}
			$("#"+hideInputId).html(hideInputHtml);
		}
		//单击radio切换相应搜索  
		$(".search-radios input").click(function(){
			setSearch($(this).attr("site"));
		});
		
		//------------------------------------back----------------------------------------------------//
		var $backToTopTxt = "返回顶部", $backToTopEle = $('<div class="back-top"></div>').appendTo($("#wrap"))
        .attr("title", $backToTopTxt).click(function() {
				$("html, body").animate({ scrollTop: 0 }, 120);
		}), $backToTopFun = function() {
			var st = $(document).scrollTop(), winh = $(window).height();
			(st > 0)? $backToTopEle.show(): $backToTopEle.hide();    
			//IE6下的定位
			if (!window.XMLHttpRequest) {
				$backToTopEle.css("top", st + winh - 166);    
			}
		};
		$(window).bind("scroll", $backToTopFun);
		$(function() { $backToTopFun(); });

	$('a[needrecord]').live("click",function(){
			var cat = $(this).attr('cat');
			var img = new Image();
			var t   = new Date().getTime();
			img.src = 'http://click.stat.hao.360.cn/clk.gif?t='+t+'&type=news&to='+cat;
	    }); 
		
});

var qtool = {};
qtool.cookie={};
qtool.cookie.getRaw=function(a){if(a=(new RegExp("(^| )"+a+"=([^;]*)(;|$)")).exec(document.cookie))return a[2]||null;return null};qtool.cookie.get=function(a){a=qtool.cookie.getRaw(a);if("string"==typeof a)return a=decodeURIComponent(a);return null};
qtool.cookie.setRaw=function(a,c,b){b=b||{};var d=b.expires;if("number"==typeof b.expires){d=new Date;d.setTime(d.getTime()+b.expires*864E5)}document.cookie=a+"="+c+(b.path?"; path="+b.path:"; path=/")+(d&&d instanceof Date?"; expires="+d.toGMTString():"")+(b.domain?"; domain="+b.domain:"")+(b.secure?"; secure":"")};qtool.cookie.set=function(a,c,b){qtool.cookie.setRaw(a,encodeURIComponent(c),b)};

$(".rss-news").click(
	function () {
	  $(".rss-news-list").removeClass("hide-rss-news");
	  $(".rss-news-list").addClass("display-rss-news");
	}); 
	$(document).click(function(e){
		var t = e.target;
		if($(t).parents('.list-content').length !==0 || $(t).attr('class') ==='rss-news')
		{
			return true;
		}
		else{
			setNewsCookie();
			hideNewsList();
		}
	});

	$('.tx-select input:checkbox').click(function(){
	  selectcolumn($(this).attr('id'));
	}); 
	$('#checkboxrest').click(function(){
	  selectcolumn($(this).attr('id'));
	});

	function selectcolumn(inputId){
	  var select_all_checkbox = 'all-news';
	  if(inputId != 'all-news' && inputId != 'checkboxrest'){
		  var checkboxsize = $('input:checkbox:checked').size();
		  if($('#' + select_all_checkbox).attr('checked') && checkboxsize<17){
			  $('#' + select_all_checkbox).attr('checked',false);
			  if($('#' + inputId + '_section').attr('class') == 'section'){
				  $('#' + inputId + '_section').addClass("nochecked");
			  }else{
				   $('#' + inputId + '_section').removeClass("nochecked");
			  }
		  }
		  else{
			  if(checkboxsize==16){
				  $('#' + select_all_checkbox).attr('checked','checked');
				  if($('#' + inputId + '_section').attr('class') == 'section'){
				  	$('#' + inputId + '_section').addClass("nochecked");
				  }else{
					   $('#' + inputId + '_section').removeClass("nochecked");
				  }
			  }
			  else{
				  $('#' + select_all_checkbox).attr('checked',false);
				  if($('#' + inputId + '_section').attr('class') == 'section'){
				  	$('#' + inputId + '_section').addClass("nochecked");
				  }else{
					   $('#' + inputId + '_section').removeClass("nochecked");
				  }
			  }
		  }
	  }else if(inputId == 'checkboxrest'){
		  $('input:checkbox').attr('checked','checked');
		  $('.section').each(function(){
			  $(this).removeClass("nochecked");
		  });
	  }else{
		  if($('#' + select_all_checkbox).attr('checked')){
			  $('input:checkbox').attr('checked','checked');
			  $('.section').each(function(){
				  $(this).removeClass("nochecked");
			  });
		  }else{
			  $('input:checkbox').attr('checked',false);
			  $('.section').each(function(){
				  $(this).addClass("nochecked");
			  });
		  }
	  }
}

(function(){
    $('#save').live('click', function(){    
		setNewsCookie();
		hideNewsList();
    });

    $('#cancel').live('click', initSelectNews); 
	initSelectNews();
})();

function initSelectNews()
{
	var unselect_news = '';
	unselect_news = qtool.cookie.get('unselect_news');
	var id_arr = new Array();
	if(unselect_news != null)
	{
		id_arr = unselect_news.split('|');
	}
	var elements = $('.tx-select input');
    for(var i = 0;i < elements.length; i++)
    {
		var ele = $(elements[i]);
		var id  = ele.attr('id');

		if(in_array(id, id_arr))
		{
			ele.attr('checked', false);
			if(id != 'all-news')
			{
				$('#'+id+'_section').addClass('nochecked');
			}
		}
		else
		{
			ele.attr('checked', true);
			$('#'+id+'_section').removeClass("nochecked");
		}
    }
	hideNewsList();
}

function in_array(value, arr)
{
	for(var i = 0; i < arr.length; i++)
	{
		if(value == arr[i]) return true;
	}
	return false;
}

function setNewsCookie()
{
	var unselect_news = '';
	var elements = $('.tx-select input:not(:checked)');
	var len = elements.length;
	for(var i = 0;i < len; i++)
	{
		var id = $(elements[i]).attr("id");
		unselect_news+= id+'|';
	}
	if(unselect_news.length)
	{
		unselect_news = unselect_news.substr(0, unselect_news.length-1);
	}
	qtool.cookie.set('unselect_news', unselect_news, {expires:365});
}

function hideNewsList()
{
	$('.rss-news-list').removeClass('display-rss-news');
	$('.rss-news-list').addClass('hide-rss-news');
}