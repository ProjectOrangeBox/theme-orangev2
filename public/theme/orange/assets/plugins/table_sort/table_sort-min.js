var table_sort={dir:"desc",sort:function(t,a){$("table.table-sort thead tr th i").removeClass("fa-sort-asc").removeClass("fa-sort-desc").addClass("fa-sort"),$("table.table-sort thead tr th").removeClass("active"),$("table.table-sort thead tr th:nth-child("+t+") i").addClass("fa-sort-"+a).removeClass("fa-sort"),$("table.table-sort thead tr th:nth-child("+t+")").addClass("active"),tinysort("table.table-sort tbody tr",{selector:"td:nth-child("+t+")",order:a,data:"value"},{selector:"td:nth-child("+t+")",order:a}),table_sort.save(t,a)},load:function(){var t=$.jStorage.get(controller_path+"saved_sort_column","");""!=t&&(parts=t.split("\t"),table_sort.sort(parts[0],parts[1]))},save:function(t,a){$.jStorage.set(controller_path+"saved_sort_column",t+"\t"+a)}};$(document).on("orange_table_updated",{},function(t){$("table.table-sort thead tr th:not(.nosort)").prepend('<i class="fa fa-sort"></i> ').on("click",function(){table_sort.dir="asc"==table_sort.dir?"desc":"asc",table_sort.sort($("table.table-sort thead tr th").index(this)+1,table_sort.dir)}),table_sort.load()});