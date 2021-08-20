<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .parent {
            width: 300px;

        }

        .trigger {
            width: 100%;
            padding: 15px;
            background-color: #3c8dbc;
            display: flex;
            align-items: center;
            transition: width .2s ease-in-out;
        }

        .trigger:after {
            content: '\25B6';
            text-align: right;
        }

        .accordion {
            padding: 0 20px;
            max-height: 1%;
            border-left: 1px solid #3c8dbc;
            border-right: 1px solid #3c8dbc;
            overflow: hidden;
            transition: all .2s ease-in-out;

        }

        .accordion.active {
            max-height: calc(100% - 0px);
            transition: all .2s ease-in-out;
        }
    </style>
</head>
<body>

<div class="parent">
    <div id="acc-trigger" class="trigger" data-accordion="accordion">Collapse</div>
    <div id="accordion" class="accordion">
        <p>W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading
            and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we
            cannot warrant full correctness of all content. While using this site, you agree to have read and accepted
            our terms of use, cookie and privacy policy. Copyright 1999-2020 by Refsnes Data. All Rights Reserved.
            Powered by W3.CSS.</p><p>W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading
            and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we
            cannot warrant full correctness of all content. While using this site, you agree to have read and accepted
            our terms of use, cookie and privacy policy. Copyright 1999-2020 by Refsnes Data. All Rights Reserved.
            Powered by W3.CSS.</p><p>W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading
            and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we
            cannot warrant full correctness of all content. While using this site, you agree to have read and accepted
            our terms of use, cookie and privacy policy. Copyright 1999-2020 by Refsnes Data. All Rights Reserved.
            Powered by W3.CSS.</p><p>W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading
            and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we
            cannot warrant full correctness of all content. While using this site, you agree to have read and accepted
            our terms of use, cookie and privacy policy. Copyright 1999-2020 by Refsnes Data. All Rights Reserved.
            Powered by W3.CSS.</p><p>W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading
            and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we
            cannot warrant full correctness of all content. While using this site, you agree to have read and accepted
            our terms of use, cookie and privacy policy. Copyright 1999-2020 by Refsnes Data. All Rights Reserved.
            Powered by W3.CSS.</p><p>W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading
            and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we
            cannot warrant full correctness of all content. While using this site, you agree to have read and accepted
            our terms of use, cookie and privacy policy. Copyright 1999-2020 by Refsnes Data. All Rights Reserved.
            Powered by W3.CSS.</p><p>W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading
            and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we
            cannot warrant full correctness of all content. While using this site, you agree to have read and accepted
            our terms of use, cookie and privacy policy. Copyright 1999-2020 by Refsnes Data. All Rights Reserved.
            Powered by W3.CSS.</p>
    </div>
</div>
<script src="{{ asset('jQuery/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.trigger').on('click', function () {
            $('.accordion').toggleClass('active')
        });
    });
</script>
</body>
</html>
