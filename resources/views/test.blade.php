<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor.js Example</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Editor.js core -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

    <!-- Tools -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>

</head>

<body>

    <div class="container my-4">
        <h3>Editor.js Example</h3>
        <div id="editorjs" style="border:1px solid #ccc; padding:10px; min-height:300px;"></div>
    </div>

    <script>
        window.addEventListener('load', function() {
            // Check if EditorJS and Tools are loaded

            // Initialize EditorJS
            const editor = new EditorJS({
                holder: 'editorjs',
                tools: {
                    header: {
                        class: Header,
                        inlineToolbar: true
                    },
                    quote: {
                        class: Quote,
                        inlineToolbar: true
                    },
                    code: {
                        class: CodeTool
                    },
                    link: {
                        class: LinkTool
                    },
                    image: {
                        class: ImageTool,
                        config: {
                            endpoints: {
                                byFile: '/upload_by_file', // Your backend file uploader endpoint
                                byUrl: '/upload_by_url', // Your endpoint that provides uploading by Url
                            },
                            additionalRequestHeaders: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }
                    },
                    List: {
                        class: EditorjsList,
                        inlineToolbar: true,
                        config: {
                            defaultStyle: 'unordered'
                        },
                    },

                    Embed: {
                        class: Embed,
                        config: {
                            services: {
                                youtube: true,
                                coub: true,
                                facebook: true,
                                instagram: true,
                                kickstarter: true,
                                livejournal: true,
                                pinterest: true,
                                reddit: true,
                                tumblr: true,
                                twitter: true,
                                vimeo: true,
                                vine: true,
                                wikipedia: true,
                            }
                        }
                    },

                }
            });
        });
    </script>

</body>

</html>
