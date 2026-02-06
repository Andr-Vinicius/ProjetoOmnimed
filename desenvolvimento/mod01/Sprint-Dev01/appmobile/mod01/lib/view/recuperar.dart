import 'package:flutter/material.dart';

class RecuperarView extends StatelessWidget {
  const RecuperarView({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    final GlobalKey<FormState> _formKey = GlobalKey<FormState>();
    final TextEditingController _novaSenhaController = TextEditingController();
    final TextEditingController _confirmarNovaSenhaController =
        TextEditingController();

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
                  controller: _novaSenhaController,
                  keyboardType: TextInputType.text,
                  decoration: const InputDecoration(
                    hintText: "Nova Senha",
                    labelText: "Nova Senha *",
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
                height: 32,
              ),
              Padding(
                padding:
                    const EdgeInsets.symmetric(horizontal: 360, vertical: 16.0),
                child: TextFormField(
                  controller: _confirmarNovaSenhaController,
                  keyboardType: TextInputType.text,
                  decoration: const InputDecoration(
                    hintText: "Confirmar Nova Senha",
                    labelText: "Confirmar Nova Senha *",
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
                      Navigator.pushNamed(context, "/logado");
                    },
                    child: const Text(
                      "Confirmar",
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
                      Navigator.pushNamed(context, "/cadastre-se");
                    },
                    child: const Text(
                      "Cancelar",
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
