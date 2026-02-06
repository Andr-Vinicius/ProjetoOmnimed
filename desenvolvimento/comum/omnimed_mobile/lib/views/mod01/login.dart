import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

class LoginView extends StatefulWidget {
  LoginView({Key? key}) : super(key: key);

  @override
  State<LoginView> createState() => _LoginViewState();
}

class _LoginViewState extends State<LoginView> {
  final _formKey = GlobalKey<FormState>();
  final TextEditingController _emailController = TextEditingController();
  bool _retorno = false;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "Bem vindo!",
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
        child: Column(
          children: [
            Form(
              key: _formKey,
              child: Padding(
                padding: const EdgeInsets.all(8.0),
                child: Column(
                  children: [
                    const SizedBox(height: 80),
                    TextFormField(
                      controller: _emailController,
                      decoration: const InputDecoration(
                        labelStyle: TextStyle(
                          color: Colors.black,
                        ),
                        border: OutlineInputBorder(
                          borderSide: BorderSide(color: Color(0xFF0f928c)),
                        ),
                        focusedBorder: OutlineInputBorder(
                          borderSide: BorderSide(
                            color: Color(0xFF0f928c),
                          ),
                        ),
                        label: Text("Email/Prontuário"),
                      ),
                      cursorColor: const Color(0xFF0f928c),
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Campo Obrigatório';
                        }
                        return null;
                      },
                    ),
                    const SizedBox(height: 25),
                    TextFormField(
                      obscureText: true,
                      decoration: const InputDecoration(
                        labelStyle: TextStyle(
                          color: Colors.black,
                        ),
                        border: OutlineInputBorder(
                          borderSide: BorderSide(color: Color(0xFF0f928c)),
                        ),
                        focusedBorder: OutlineInputBorder(
                          borderSide: BorderSide(
                            color: Color(0xFF0f928c),
                          ),
                        ),
                        label: Text("Senha"),
                      ),
                      cursorColor: const Color(0xFF0f928c),
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Campo Obrigatório';
                        }
                        return null;
                      },
                    ),
                    const SizedBox(height: 25),
                    SwitchListTile(
                        title: const Text('Manter Logado'),
                        secondary: const Icon(
                          Icons.replay,
                          color: Color(0xFF0f928c),
                        ),
                        activeColor: const Color(0xFF0f928c),
                        value: _retorno,
                        onChanged: (bool value) {
                          setState(() {
                            _retorno = value;
                          });
                        }),
                    const SizedBox(height: 25),
                    ElevatedButton(
                      style: ButtonStyle(
                        backgroundColor: MaterialStateProperty.all(const Color(0xFF0f928c),)
                      ),
                      onPressed: () => {
                        Navigator.pop(context)
                      },
                      child: const Text(
                        "Logar",
                        style: TextStyle(
                          color: Colors.white,
                        ),
                      ),
                    ),
                    const SizedBox(height: 25,),
                    TextButton(
                      onPressed: () => {
                        if(_emailController.text != ""){
                          ScaffoldMessenger.of(context).showSnackBar(
                            const SnackBar(
                              content: Text("Email de recuperação enviado!", style: TextStyle(color: Colors.white),),
                              backgroundColor: Color.fromARGB(255, 0, 255, 98),
                            )
                          )
                        }else{
                          ScaffoldMessenger.of(context).showSnackBar(
                            const SnackBar(
                              content: Text("Email/Prontuário não existente...", style: TextStyle(color: Colors.white),),
                              backgroundColor: Colors.redAccent,
                            )
                          )
                        },
                      },
                      child: const Text(
                        "Esqueci a Senha",
                        style: TextStyle(
                          color: Color(0xFF0f928c),
                        ),
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
