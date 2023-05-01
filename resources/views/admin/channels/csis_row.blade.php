<tr data-index="{{ $index }}">
    <td>{!! Form::text('csis['.$index.'][cs_token]', old('csis['.$index.'][cs_token]', isset($field) ? $field->cs_token: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('csis['.$index.'][move_path]', old('csis['.$index.'][move_path]', isset($field) ? $field->move_path: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>