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

    var id = parseInt(Math.random() * 50)

    var name_skill = $("input[name='name_skill']").val();
    var area_skill = $("input[name='area_skill']").val();
    var level_skill = $("input[name='lvl']:checked").val();

    if (!!name_skill && !!area_skill) {
        $("input[name='name_skill']").removeClass("error")
        $("input[name='area_skill']").removeClass("error")

        var newItem = "<span id=" + id + " class='btn-level level-" + level_skill + " skill-tag'><input type='hidden' name='level' value='" + level_skill + "' disabled><input type='hidden' name='skill' value='" + name_skill + "' disabled><input type='hidden' name='area' value='" + area_skill + "' disabled> <i class='fa-sharp fa-solid fa-xmark' onclick='deleteSkill(" + id + ")'></i> " + name_skill + "</span>";

        $("#skill_list").append(newItem);

        $("input[name='name_skill']").val("");
        $("input[name='area_skill']").val("");

    }else {
        if(!!name_skill) {
            $("input[name='name_skill']").removeClass("error")
        }else {
            $("input[name='name_skill']").addClass("error")
        }

        if(!!area_skill) {
            $("input[name='area_skill']").removeClass("error")
        }else {
            $("input[name='area_skill']").addClass("error")
        }
    }
}

function deleteSkill(id) {
    $('#' + id).remove();
}