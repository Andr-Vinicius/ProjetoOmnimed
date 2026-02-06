import 'package:flutter/material.dart';

class LoginView extends StatelessWidget {
  const LoginView({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    final GlobalKey<FormState> _formKey = GlobalKey<FormState>();
    final TextEditingController _usuarioController = TextEditingController();
    final TextEditingController _senhaController = TextEditingController();

    return Scaffold(
      backgroundColor: const Color.fromARGB(255, 212, 206, 206),
      body: Form(
        key: _formKey,
        child: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Padding(
                padding:
                    const EdgeInsets.symmetric(horizontal: 360, vertical: 16.0),
                child: TextFormField(
                  controller: _usuarioController,
                  keyboardType: TextInputType.text,
                  decoration: const InputDecoration(
                    hintText: "Email/Prontuário",
                    labelText: "Email/Prontuário *",
                    labelStyle:
                        TextStyle(color: Color(0xFF484848), fontSize: 18),
                    focusedBorder: OutlineInputBorder(
                      borderSide: BorderSide(
                        color: Color(0xff006465),
                      ),
                    ),
                  ),
                  cursorColor: Colors.black,
                  style: const TextStyle(color: Colors.black, fontSize: 18),
                  validator: (text) {
                    return text!.isEmpty
                        ? "Email/Prontuário obrigatório!"
                        : null;
                  },
                ),
              ),
              const SizedBox(
                height: 32,
              ),
              Padding(
                padding:
                    const EdgeInsets.symmetric(horizontal: 360, vertical: 16.0),
                child: TextFormField(
                  controller: _senhaController,
                  keyboardType: TextInputType.text,
                  decoration: const InputDecoration(
                    hintText: "Senha",
                    labelText: "Senha *",
                    labelStyle:
                        TextStyle(color: Color(0xFF484848), fontSize: 18),
                    focusedBorder: OutlineInputBorder(
                      borderSide: BorderSide(
                        color: Color(0xff006465),
                      ),
                    ),
                  ),
                  cursorColor: Colors.black,
                  style: const TextStyle(color: Colors.black, fontSize: 18),
                  validator: (text) {
                    return text!.isEmpty ? "Senha obrigatória!" : null;
                  },
                ),
              ),
              const SizedBox(
                height: 40,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  ElevatedButton(
                    onPressed: () {
                      Navigator.pushNamed(context, "/LogadoView");
                    },
                    child: const Text(
                      "Entrar",
                      style: TextStyle(
                        color: Color(0xFF484848),
                        fontSize: 18,
                      ),
                    ),
                    style: ElevatedButton.styleFrom(
                      primary: Color(0xff00c9d2),
                    ),
                  ),
                ],
              ),
              const SizedBox(
                height: 20,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  ElevatedButton(
                    onPressed: () {
                      Navigator.pushNamed(context, "/PacienteView");
                    },
                    child: const Text(
                      "Cadastre-se",
                      style: TextStyle(
                        color: Color(0xFF484848),
                        fontSize: 18,
                      ),
                    ),
                    style: ElevatedButton.styleFrom(
                      primary: Color(0xffbeee3b),
                    ),
                  )
                ],
              )
            ],
          ),
        ),
      ),
    );
  }
}
