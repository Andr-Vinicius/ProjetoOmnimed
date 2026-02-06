import 'package:dio/dio.dart';
import 'package:flutter/material.dart';

class CadastroPacienteView extends StatefulWidget {
  const CadastroPacienteView({Key? key}) : super(key: key);

  @override
  _CadastroPacienteViewState createState() => _CadastroPacienteViewState();
}

enum Sexo { Masculino, Feminino, Outros }

class _CadastroPacienteViewState extends State<CadastroPacienteView> {
  Sexo _sexo = Sexo.Masculino;
  final GlobalKey<FormState> _formkey = GlobalKey<FormState>();

  final TextEditingController usuarioController = TextEditingController();
  final TextEditingController dataNascimentoController =
      TextEditingController();
  final TextEditingController emailController = TextEditingController();
  final TextEditingController sexoController = TextEditingController();
  final TextEditingController cpfController = TextEditingController();
  final TextEditingController rgController = TextEditingController();
  final TextEditingController emissorController = TextEditingController();
  final TextEditingController cel1Controller = TextEditingController();
  final TextEditingController cel2Controller = TextEditingController();
  final TextEditingController senhaController = TextEditingController();
  final TextEditingController cepController = TextEditingController();
  final TextEditingController logradouroController = TextEditingController();
  final TextEditingController bairroController = TextEditingController();
  final TextEditingController cidadeController = TextEditingController();

  void _buscarCep() async {
    Dio dio = Dio();

    String urlBase = "https://viacep.com.br/ws/";

    Response response = await dio.get(urlBase + cepController.text + "/json/");
    if (response.statusCode == 200) {
      setState(() {
        logradouroController.text = response.data['logradouro'];
        bairroController.text = response.data['bairro'];
        cidadeController.text = response.data['localidade'];
      });
    } else {
      setState(() {
        throw Exception('Requisição inválida');
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "Cadastrar Paciente",
          style: TextStyle(
            color: Color(0xFF0f928c),
            fontWeight: FontWeight.bold,
          ),
        ),
        backgroundColor: Colors.white,
        foregroundColor: const Color(0xFF0f928c),
        centerTitle: true,
      ),
      body: SingleChildScrollView(
        child: Form(
          key: _formkey,
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: usuarioController,
                    keyboardType: TextInputType.text,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.person),
                      labelText: "Nome Completo",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 32,
              ),
              //DATA NASCIMENTO
              //SEXO
              const Padding(
                  padding: EdgeInsets.symmetric(horizontal: 32),
                  child: Text(
                    "Gênero",
                    style: TextStyle(
                      color: Color(0xFF0f928c),
                      fontSize: 24,
                    ),
                  )),

              ListTile(
                  title: const Text("Masculino"),
                  leading: Radio<Sexo>(
                    value: Sexo.Masculino,
                    groupValue: _sexo,
                    onChanged: null,
                  )),
              ListTile(
                  title: const Text("Feminino"),
                  leading: Radio<Sexo>(
                    value: Sexo.Feminino,
                    groupValue: _sexo,
                    onChanged: null,
                  )),
              ListTile(
                  title: const Text("Outros"),
                  leading: Radio<Sexo>(
                    value: Sexo.Outros,
                    groupValue: _sexo,
                    onChanged: null,
                  )),
              const SizedBox(
                height: 32,
              ),
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: usuarioController,
                    keyboardType: TextInputType.text,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.person),
                      labelText: "Nome Completo",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 32,
              ),
              //CPF
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: cpfController,
                    keyboardType: TextInputType.text,
                    maxLength: 40,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.stars),
                      labelText: "CPF",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 32,
              ),
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: rgController,
                    keyboardType: TextInputType.text,
                    maxLength: 40,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.document_scanner),
                      labelText: "RG",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 32,
              ),
              //ORGÃO EMISSOR
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: emissorController,
                    keyboardType: TextInputType.text,
                    maxLength: 5,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.abc),
                      labelText: "Orgão Emissor",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 32,
              ),
              //NUMERO
              //ESTADO
              //CEL 1
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: cel1Controller,
                    keyboardType: TextInputType.phone,
                    maxLength: 10,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.phone),
                      labelText: "Telefone Celular 1",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 32,
              ),
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: cel2Controller,
                    keyboardType: TextInputType.phone,
                    maxLength: 10,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.phone),
                      labelText: "Telefone Celular 2",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 32,
              ),
              //CEL 2
              //POSSUI FILHOS -> QNTD FILHOS
              //POSSUI DOENÇAS CRONICAS -> QUAIS
              //REALIZA TRATAMENTO -> QUAIS
              //FAZ USO MEDICAMENTOS -> QUAIS
              //ALEGIA? QUAIS
              //EMAIL
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: emailController,
                    keyboardType: TextInputType.emailAddress,
                    maxLength: 40,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.email),
                      labelText: "Email",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 32,
              ),
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: senhaController,
                    keyboardType: TextInputType.text,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.key),
                      labelText: "Senha",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 32,
              ),
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: cepController,
                    keyboardType: TextInputType.text,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.email),
                      labelText: "CEP",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 12,
              ),
              IconButton(
                  onPressed: () {
                    if (cepController.text.isNotEmpty &&
                        cepController.text.length == 8) {
                      _buscarCep();
                    } else {}
                  },
                  icon: const Icon(
                    Icons.search,
                    size: 20,
                  )),
              const SizedBox(
                height: 32,
              ),
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: logradouroController,
                    keyboardType: TextInputType.text,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.house),
                      labelText: "Logradouro",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 32,
              ),
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: bairroController,
                    keyboardType: TextInputType.text,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.streetview),
                      labelText: "Bairro *",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 32,
              ),
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 32),
                  child: TextFormField(
                    controller: cidadeController,
                    keyboardType: TextInputType.text,
                    decoration: const InputDecoration(
                      icon: Icon(Icons.location_city),
                      labelText: "Cidade *",
                      labelStyle:
                          TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                    ),
                    cursorColor: Colors.white,
                    style:
                        const TextStyle(color: Color(0xFF0f928c), fontSize: 24),
                  )),
              const SizedBox(
                height: 32,
              ),
              ElevatedButton(
                  onPressed: () {
                    Navigator.pushNamed(context, "/");
                  },
                  child: 
                  const Text("Cadastrar",
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 24,
                      ),
                  ),
                  style: ElevatedButton.styleFrom(
                    primary: const Color(0xFF0f928c),
                  )),
                  const SizedBox(height: 32,)
            ],
          ),
        ),
      ),
    );
  }
}
