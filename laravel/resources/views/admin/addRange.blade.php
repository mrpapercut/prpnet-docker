@extends('layout.app')

@section('content')
<h2>Add range</h2>
<div>
<form method="post" action="/admin/group/addrange">
    @csrf
    <fieldset>
        <input type="file" id="file">
        <label for="file">Upload ABC File</label>
    </fieldset>
    <fieldset>
        <button id="addrange" class="warning" disabled>Add range</button>
    </fieldset>
</form>
</div>

<!-- <script src="{{ asset('js/abcfileparser.js') }}"></script> -->
<script>
const parser = new ABCFileParser();

const fileinput = document.getElementById('file');

fileinput.addEventListener('change', e => {
    readFiles(e.target.files);
});

const readFiles = files => {
    const reader = new FileReader();

    reader.addEventListener('load', () => {
        // filecontents.value = reader.result;
        const parsedInfo = parser.processFile(reader.result);

        console.log(parsedInfo);

        // renderSummary(parsedInfo);
        // renderTable(parsedInfo);
        // createSqlQueries(parsedInfo);
    });

    reader.readAsText(files[0]);
}
</script>

@endsection
