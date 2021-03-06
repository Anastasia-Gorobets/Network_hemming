<html>
<head>
    <style>
        .inp {
            width: 40px;
            height: 40px;
        }

        .colorInput {
            background-color: #67b168;
        }

        .whiteInput {
            background-color: #FFFFFF;
        }

        .symbols {
            float: left;
            margin-right: 20px;
        }

        .symbols:nth-child(1) {
            clear: left;
        }

        #submit, #identify {
            margin-top: 10px;
            width: 150px;
            height: 50px;
            border-radius: 10px;
            background-color: #87CEEB;
        }

        .clearleft {
            clear: left;
        }

        h3 {
            color: #ff0000;
        }
    </style>
    <script src="js/jquery-3.1.1.js"></script>
    <script>
        function calc() {
            var x1 = $("input[name='x1[]' ").map(function () {
                return this.value;
            }).get();
            var x2 = $("input[name='x2[]'").map(function () {
                return this.value;
            }).get();
            var x3 = $("input[name='x3[]'").map(function () {
                return this.value;
            }).get();
            var x4 = $("input[name='x4[]'").map(function () {
                return this.value;
            }).get();
            var x5 = $("input[name='x5[]'").map(function () {
                return this.value;
            }).get();
            var xi = $("input[name='xi[]'").map(function () {
                return this.value;
            }).get();

            var ident = $("#identify").attr('data-title');
            if ($(""))
                $.ajax({
                    url: 'hemming.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        x1: x1,
                        x2: x2,
                        x3: x3,
                        x4: x4,
                        x5: x5,
                        ident: ident,
                        xi: xi
                    },
                    success: function (data) {
                        $("#result").html(data);
                    }
                });
        }
    </script>
</head>
<body>
<form method="POST">
    <?php
    echo '<br>'; ?>
    <div class="symbols">
        <?php for ($i = 0; $i < 20; $i++) {
            if ($i % 4 == 0) echo '<br>';
            echo '<input type="text" name="x1[]" value="-1" class="inp" >';
        } ?>
    </div>
    <div class="symbols">
        <?php
        for ($i = 0; $i < 20; $i++) {
            if ($i % 4 == 0) echo '<br>';
            echo '<input type="text" name="x2[]" value="-1" class="inp" >';
        }
        ?>
    </div>
    <div class="symbols">
        <?php
        for ($i = 0; $i < 20; $i++) {
            if ($i % 4 == 0) echo '<br>';
            echo '<input type="text" name="x3[]" value="-1" class="inp" >';
        }
        ?>
    </div>
    <div class="symbols">
        <?php
        for ($i = 0; $i < 20; $i++) {
            if ($i % 4 == 0) echo '<br>';
            echo '<input type="text" name="x4[]" value="-1" class="inp" >';
        }
        ?>
    </div>
    <div class="symbols">
        <?php
        for ($i = 0; $i < 20; $i++) {
            if ($i % 4 == 0) echo '<br>';
            echo '<input type="text" name="x5[]" value="-1" class="inp" >';
        }
        ?>
    </div>
    <div class="clearleft">
        <input type="button" name="Submit" id="submit" value="Train" onclick="calc()">
    </div>
    <h1>Symbol to recognize</h1>
    <div class="symbols">
        <?php
        for ($i = 0; $i < 20; $i++) {
            if ($i % 4 == 0) echo '<br>';
            echo '<input type="text" name="xi[]" value="-1" class="inp" >';
        }
        ?>
    </div>
    <div class="clearleft">
        <input type="button" name="Identify" value="Identify" data-title="" id="identify" disabled>
    </div>
</form>
<div id="result">
</div>
<script>
    $(function () {

        $("#submit").click(function () {
            $("#identify").removeAttr('disabled');
        });
        $("input[name*='x']").click(function () {
            if (this.value == '1') {
                $(this).val('-1');
                $(this).removeClass('colorInput');
                $(this).addClass('whiteInput');
            }
            else {
                $(this).val('1');
                $(this).removeClass('whiteInput');
                $(this).addClass('colorInput');
            }
        });
        $("#identify").click(function () {
            $(this).attr('data-title', 'true');
            calc();
        });
    });
</script>
</body>
</html>
