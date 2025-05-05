<?php

namespace Core\Selector;

class SelectorComponent
{

    public static function Show(string $id, string $label, array $list, bool $isRequired, string $defaultText = null)
    {
        $requiredText = $isRequired ? "required" : "";
        echo "<label for='$id' class='form-label'>$label</label>";
        echo "<select class='form-select form-select-sm' id='$id' name='$id' $requiredText title='Укажите $label'>";
        echo "<option selected disabled>$defaultText</option>";
        foreach ($list as $k => $v) {
            echo "<option value='$v->id'>$v->showName</option>";
        }
        echo "</select>";
    }
}