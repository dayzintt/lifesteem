<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <div>
        <form action ="">
            <fieldset>
                <legend><b>cadastro</b></legend>
                <br>
                <div class="inputbox">
                    <input type = "text" name = "nome" id = "nome" class = "inputuser" required>
                    <label for= "nome">Nome competo</label>
                </div>
                <div class="inputbox">
                    <input type = "email" name = "email" id = "email" class = "inputuser" required>
                    <label for= "email">E-mail</label>
                </div>
                <div class="inputbox">
                    <input type = "teelfone" name = "telefone" id = "telefone" class = "inputuser" required>
                    <label for= "telefone">Telefone</label>
                </div>
                <div class="inputbox">
                    <input type = "text" name = "CPF" id = "CPF" class = "inputuser" required>
                    <label for= "CPF">Os ultimos 3 digitos do seu cpf.</label>
                </div>
                <div class="inputbox">
                    <input type = "radio" name = "sexo" id = "sexo" class = "inputuser" required>
                    <label for= "sexo">Feminino</label>
                    <input type = "radio" name = "sexo" id = "sexo" class = "inputuser" required>
                    <label for= "sexo">Masculino</label>
                    <input type = "radio" name = "sexo" id = "sexo" class = "inputuser" required>
                    <label for= "sexo">Não-binario</label>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>