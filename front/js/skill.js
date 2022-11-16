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

let times = 0;

function newSkill() {

    times++
    var id = parseInt(Math.random() * 50);

    var name_skill = $("input[name='name_skill']").val();
    var area_skill = $("input[name='area_skill']").val();
    var level_skill = $("input[name='lvl']:checked").val();

    if (!!name_skill && !!area_skill) {
        $("input[name='name_skill']").removeClass("error")
        $("input[name='area_skill']").removeClass("error")

        if (times <= 10) {
            var newItem = "<span id=" + id + " class='btn-level level-" + level_skill + " skill-tag'><input type='hidden' name='level-" + id + "' value='" + level_skill + "'><input type='hidden' name='skill-" + id + "' value='" + name_skill + "'><input type='hidden' name='area-" + id + "' value='" + area_skill + "'> <i class='fa-sharp fa-solid fa-xmark' onclick='deleteSkill(" + id + ")'></i> " + name_skill + "</span>";
            $("#skill_list").append(newItem);

            $("input[name='name_skill']").val("");
            $("input[name='area_skill']").val("");
        }else {
            alert('O numero máximo de Skills são 10.')
        }

    } else {
        if (!!name_skill) {
            $("input[name='name_skill']").removeClass("error")
        } else {
            $("input[name='name_skill']").addClass("error")
        }

        if (!!area_skill) {
            $("input[name='area_skill']").removeClass("error")
        } else {
            $("input[name='area_skill']").addClass("error")
        }
    }
}

function deleteSkill(id) {

    $('#' + id).remove();
}
