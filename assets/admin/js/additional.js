    // Change link
    $('body').on('click', '.dialogContent .change', function() {
        var changeContent = $(this).closest(".dialogContent");
        var name = changeContent.find("#name").val();
        var link = changeContent.find("#link").val();
        var contentId = changeContent.data("content-id");
        var id = changeContent.data("dialog-id");
        var change = $($(".dd-item[data-id="+id+"]").find("div.rowname")[0]).text(name);
        var changename = $($(".dd-item[data-id="+id+"]").find(".rowname2")[0]).val(name);
        var changenew = $($(".dd-item[data-id="+id+"]").find(".rownew")[0]).val(name);
        var changelink = $($(".dd-item[data-id="+id+"]").find(".rowlink")[0]).val(link);

        $(this).closest('.ui-dialog-content').dialog('close'); 
    });

    // Change page
    $('body').on('click', '.dialogContent .changepage', function() {
        var changeContent = $(this).closest(".dialogContent");
        var name = changeContent.find(".name option:selected").text();
        var selectid  = changeContent.find(".name").val();
        var contentId = changeContent.data("content-id");
        var id = changeContent.data("dialog-id");
        var change = $($(".dd-item[data-id="+id+"]").find("div.rowname")[0]).text(name);
        var changerow2 = $($(".dd-item[data-id="+id+"]").find(".rowname2")[0]).val(name);
        var changelink = $($(".dd-item[data-id="+id+"]").find(".rowlink")[0]).val(selectid);

        $(this).closest('.ui-dialog-content').dialog('close'); 
    });

    // Delete
    $('body').on('click', '.dialogContent .delete', function() {
        var DeleteContent = $(this).closest(".dialogContent");
        var selectid  = DeleteContent.find(".name").val();
        var contentId = DeleteContent.data("content-id");
        var id = DeleteContent.data("dialog-id");
        var htmlDel = "<input name=\"del[]\" value=\""+id+"\" style=\"display: none;\">";
        var change = $($(".dd-item[data-id="+id+"]").replaceWith(htmlDel));
        $(this).closest('.ui-dialog-content').dialog('close'); 
    });

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };