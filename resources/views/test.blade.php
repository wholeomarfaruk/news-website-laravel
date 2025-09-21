<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor.js Example</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="{{asset('plugins/richtexteditor/rte_theme_default.css')}}" />
<script type="text/javascript" src="{{asset('plugins/richtexteditor/rte.js')}}"></script>
<script type="text/javascript" src='{{asset('plugins/richtexteditor/plugins/all_plugins.js')}}'></script>
</head>

<body>
    <form id="editorForm" action="{{ route('test.submit') }}" method="post">
        @csrf


        <textarea name="editor_data" id="editor_data"></textarea>
        <button type="submit">Submit</button>
    </form>

<script>
	var editor1 = new RichTextEditor("#editor_data");
	//editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");

</script>
</body>

</html>
