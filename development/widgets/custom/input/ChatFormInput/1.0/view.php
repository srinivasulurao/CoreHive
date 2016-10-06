<?php /* Originating Release: February 2014 */?>
<rn:block id="top"/>
<? switch ($this->dataType):
    case 'Boolean':
    case 'Country':
    case 'NamedIDLabel':
    case 'NamedIDOptList':
    case 'Status':
    case 'Asset':
    case 'AssignedSLAInstance':?>
        <rn:widget path="input/SelectionInput"/>
        <? break;
    case 'Date':
    case 'DateTime':?>
        <rn:widget path="input/DateInput"/>
        <? break;
    default: ?>
        <? if ($this->fieldName === 'NewPassword'): ?>
        <rn:widget path="input/PasswordInput"/>
        <? else: ?>
        <rn:widget path="custom/input/TextInput"/>
        <? endif; ?>
        <? break;
endswitch;?>
<rn:block id="bottom"/>