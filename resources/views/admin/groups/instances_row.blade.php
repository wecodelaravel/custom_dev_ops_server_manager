<tr data-index="{{ $index }}">
    <td>{!! Form::number('instances['.$index.'][quantity_to_create]', old('instances['.$index.'][quantity_to_create]', isset($field) ? $field->quantity_to_create: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('instances['.$index.'][cs_token]', old('instances['.$index.'][cs_token]', isset($field) ? $field->cs_token: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>