function check(level) {

    $("#" + level).prop("checked", true);


    for (i = 0; i <= 5; i++) {
        if ($("#" + i).is(":checked")) {
            $('.level-' + i).addClass('selected');
        } else {
            $('.level-' + i).removeClass('selected');
        }
    }
};

function newSkill() {

    var name_skill = $("input[name='name_skill']").val();
    var area_skill = $("input[name='area_skill']").val();
    var level_skill = $("input[name='lvl']:checked").val();

    var newItem = "<span class='btn-level level-"+level_skill+" skill-tag'><input type='hidden' name='level' value='"+level_skill+"' disabled><input type='hidden' name='skill' value='"+name_skill+"' disabled><input type='hidden' name='area' value='"+area_skill+"' disabled>"+name_skill+ " &nbsp;"+level_skill+"</span>";

    $("#skill_list").append(newItem);
    }