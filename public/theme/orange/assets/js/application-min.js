var orange=orange||{},messages=messages||[],plugins=plugins||[];function debounce(a,e,t){var n;return function(){var i=this,o=arguments,s=t&&!n;clearTimeout(n),n=setTimeout(function(){n=null,t||a.apply(i,o)},e),s&&a.apply(i,o)}}var pleaseWaitDiv=$('<div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1"role="dialog" aria-hidden="true" data-backdrop="static"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><h4 class="modal-title"><span class="glyphicon glyphicon-time"></span> Processing</h4></div><div class="modal-body"><div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="sr-only"></span></div></div></div></div></div></div>');function orangejax(a,e,t,n){var i={200:function(a){notify.addSuccess("200 OK")},201:function(a){notify.addSuccess("201 Created")},202:function(a){notify.addSuccess("202 Accepted")},401:function(a){notify.addError("401 Unauthorized")},404:function(a){notify.addError("404 Not Found")},406:function(a){notify.addError("406 Not Acceptable")},500:function(a){notify.addError("500 Internal Server Error")}};jQuery.ajax({method:a,url:e,data:t,dataType:"json",cache:!1,timeout:5e3,async:!0,statusCode:Object.assign(i,n)})}orange.widget_minipipe=function(a){$.ajax({type:"POST",url:$(a).data("widget"),async:!0,data:{options:$(a).data()},success:function(e,t,n){if(e.html)orange.widget_replace(a,e.html);else if(e.json){var i=$(a).data("handlebars");document.getElementById(i)?orange.widget_replace(a,Handlebars.compile(document.getElementById(i).innerHTML)(e.json)):orange.widget_replace(a,"{{Template ID "+i+" Missing}}")}else orange.widget_replace(a,"{{HTML Missing}}")},error:function(e,t,n){1==$(a).data().errors&&orange.widget_replace(a,"{{error}}")}})},orange.widget_replace=function(a,e){/^(?:area|br|col|embed|hr|img|input|link|meta|param)$/i.test($(a)[0].tagName)?$(a).replaceWith(e):$(a).html(e)},orange.post=function(a,e,t){$.ajax({type:"POST",url:a,data:e,success:t,dataType:"json"})},orange.patch=function(a,e,t){$.ajax({type:"PATCH",url:a,data:e,success:t,dataType:"json"})},orange.put=function(a,e,t){$.ajax({type:"PUT",url:a,data:e,success:t,dataType:"json"})},orange.get=function(a,e,t){$.ajax({type:"GET",url:a,data:e,success:t,dataType:"json"})},orange.notice_off_element=function(a,e){var t=a.data();if($.extend(t,e),t.msg){var n=t.type?t.type:"info",i=!!t.stay&&"true"==t.stay;$.noticeAdd({text:t.msg,type:n,stay:i})}},document.addEventListener("DOMContentLoaded",function(a){$("[data-widget]").each(function(){orange.widget_minipipe(this)}),$(".js-get").click(function(a){a.preventDefault(),orange.js_get_that=$(this),orange.get($(this).attr("href"),$(this).data(),function(a){orange.notice_off_element(orange.js_get_that,a)})}),$(".hide-until-domready").show()});