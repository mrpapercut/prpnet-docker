@extends('layout.app')

@section('content')
<h2>Add range</h2>
<div>
<form method="post" action="/admin/group/addrange">
    @csrf
    <fieldset>
        <input type="file" id="file">
        <label for="file">Upload ABC File</label>
        <div id="filesummary"></div>
    </fieldset>
    <fieldset>
        <button id="addrange" class="warning" disabled>Add range</button>
    </fieldset>
</form>
</div>

<script>
const parser = new ABCFileParser();

const fileinput = document.getElementById('file');
const summary = document.getElementById('filesummary');

fileinput.addEventListener('change', e => {
    readFiles(e.target.files);
});

const readFiles = files => {
    const reader = new FileReader();

    reader.addEventListener('load', () => {
        // filecontents.value = reader.result;
        const parsedInfo = parser.processFile(reader.result);

        console.log(parsedInfo);

        renderSummary(parsedInfo);
        // renderTable(parsedInfo);
        // createSqlQueries(parsedInfo);
    });

    reader.readAsText(files[0]);
}

const renderSummary = parsedInfo => {
    // Empty div
    summary.innerHTML = '';

    const div = html => {
        const d = document.createElement('div');
        d.innerHTML = html;
        return d;
    }

    const isvalid = div(`Header is valid:\t\t${parsedInfo.isValidHeader}`);
    const headerformat = div(`Header format: ${parsedInfo.headerFormat}`);
    const base = div(`Base: ${[...new Set(parsedInfo.candidates.map(c => c.b))]}`);
    const totalcandidates = div(`Total candidates: ${parsedInfo.candidates.length}`);
    const minmaxn = div(`Min N: ${parsedInfo.minN}<br>Max N: ${parsedInfo.maxN}`);
    const minDecimalLength = div(`Min Decimal Length: ${Math.min(...parsedInfo.candidates.map(c => c.decimalLength))}`);
    const maxDecimalLength = div(`Max Decimal Length: ${Math.max(...parsedInfo.candidates.map(c => c.decimalLength))}`);

    summary.append(isvalid, headerformat, base, totalcandidates, minmaxn, minDecimalLength, maxDecimalLength);
}
</script>
@endsection
