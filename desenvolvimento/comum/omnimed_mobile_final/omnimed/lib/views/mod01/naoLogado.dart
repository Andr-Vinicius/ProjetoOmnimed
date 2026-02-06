import 'package:flutter/material.dart';

class NaoLogadoView extends StatelessWidget {
  const NaoLogadoView({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: const Text(
            "Seja Bem Vindo(a)!",
            style: TextStyle(
              color: Color(0xFF0f928c),
              fontWeight: FontWeight.bold,
            ),
          ),
          backgroundColor: Colors.white,
          foregroundColor: const Color(0xFF0f928c),
          centerTitle: true,
        ),
        drawer: Drawer(
          child: ListView(
            children: <Widget>[
              Container(
                decoration:
                    const BoxDecoration(color: Color.fromARGB(255, 17, 52, 50)),
                child: Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Column(
                    children: [
                      Image.asset("assets/icons/omnimed_icon.png", height: 40)
                    ],
                  ),
                ),
              ),
              ListTile(
                leading: const Icon(
                  Icons.arrow_circle_right_outlined,
                  color: Color(0xFF0f928c),
                ),
                title: const Text("Sobre o Projeto"),
                trailing: const Icon(
                  Icons.arrow_right,
                  color: Color(0xFF0f928c),
                ),
                onTap: () => Navigator.pushNamed(context, "/SobreView"),
              ),
              ListTile(
                leading: const Icon(
                  Icons.arrow_circle_right_outlined,
                  color: Color(0xFF0f928c),
                ),
                title: const Text("Acesse Já"),
                trailing: const Icon(
                  Icons.arrow_right,
                  color: Color(0xFF0f928c),
                ),
                onTap: () => Navigator.pushNamed(context, "/LoginView"),
              ),
              ListTile(
                leading: const Icon(
                  Icons.arrow_circle_right_outlined,
                  color: Color(0xFF0f928c),
                ),
                title: const Text("Cadastre-se"),
                trailing: const Icon(
                  Icons.arrow_right,
                  color: Color(0xFF0f928c),
                ),
                onTap: () => Navigator.pushNamed(context, "/PacienteView"),
              ),
              ListTile(
                leading: const Icon(
                  Icons.arrow_circle_right_outlined,
                  color: Color(0xFF0f928c),
                ),
                title: const Text("Contate-nos"),
                trailing: const Icon(
                  Icons.arrow_right,
                  color: Color(0xFF0f928c),
                ),
                onTap: () => Navigator.pushNamed(context, "/ContatoView"),
              )
            ],
          ),
        ),
        body: Container(
          decoration:
              const BoxDecoration(color: Color.fromARGB(255, 17, 52, 50)),
          child: ListView(children: <Widget>[
            Column(
              children: [
                (Padding(
                    padding: const EdgeInsets.symmetric(
                        horizontal: 20, vertical: 20),
                    child: Image.asset(
                      "assets/icons/omnimed_icon.png",
                      height: 200,
                    ))),
              ],
            ),
            const SizedBox(
              height: 32,
            ),
            Column(
              children: [
                (Padding(
                    padding: EdgeInsets.symmetric(horizontal: 100),
                    child: Text(
                      "Confira algumas de nossas especialidades:",
                      textAlign: TextAlign.center,
                      style: TextStyle(
                        color: Color.fromARGB(255, 254, 255, 255),
                        fontWeight: FontWeight.bold,
                        fontSize: 32,
                      ),
                    ))),
              ],
            ),
            Column(
              children: [
                (Padding(
                  padding: EdgeInsets.symmetric(horizontal: 100, vertical: 50),
                  child: Card(
                    color: Colors.white,
                    child: Container(
                      padding: EdgeInsets.all(32.0),
                      child: Column(
                        children: <Widget>[
                          const Icon(
                            Icons.schedule_rounded,
                            size: 60.0,
                            color: Color(0xFF0f928c),
                          ),
                          Text(
                              "Agendamento de Teleconsultas",
                              textAlign: TextAlign.center,
                              style: TextStyle(
                                color: Color(0xFF0f928c),
                                fontWeight: FontWeight.bold,
                                fontSize: 30,
                              )),
                          Divider(),
                          Text(
                            "O paciente pode acessar a plataforma e realizar um agendamento de consulta, podendo ser específica ou não.",
                            textAlign: TextAlign.center,
                            style: TextStyle(
                              color: Color.fromARGB(255, 17, 52, 50),
                              fontWeight: FontWeight.normal,
                              fontSize: 20,
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                ))
              ],
            ),
            Column(
              children: [
                (Padding(
                  padding: EdgeInsets.symmetric(horizontal: 100, vertical: 50),
                  child: Card(
                    color: Colors.white,
                    child: Container(
                      padding: EdgeInsets.all(32.0),
                      child: Column(
                        children: <Widget>[
                          const Icon(
                            Icons.arrow_circle_right_outlined,
                            size: 60.0,
                            color: Color(0xFF0f928c),
                          ),
                          Text(
                              "Encaminhamentos",
                              textAlign: TextAlign.center,
                              style: TextStyle(
                                color: Color(0xFF0f928c),
                                fontWeight: FontWeight.bold,
                                fontSize: 30,
                              )),
                          Divider(),
                          Text(
                            "O paciente pode receber encaminhamentos para a realizar de exames ou outras consultas.",
                            textAlign: TextAlign.center,
                            style: TextStyle(
                              color: Color.fromARGB(255, 17, 52, 50),
                              fontWeight: FontWeight.normal,
                              fontSize: 20,
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                ))
              ],
            ),
            Column(
              children: [
                (Padding(
                  padding: EdgeInsets.symmetric(horizontal: 100, vertical: 50),
                  child: Card(
                    color: Colors.white,
                    child: Container(
                      padding: EdgeInsets.all(32.0),
                      child: Column(
                        children: <Widget>[
                          const Icon(
                            Icons.medication,
                            size: 60.0,
                            color: Color(0xFF0f928c),
                          ),
                          Text(
                              "Prescrições Médicas",
                              textAlign: TextAlign.center,
                              style: TextStyle(
                                color: Color(0xFF0f928c),
                                fontWeight: FontWeight.bold,
                                fontSize: 30,
                              )),
                          Divider(),
                          Text(
                            "O paciente pode receber prescrições médicas, por receitas digitais.",
                            textAlign: TextAlign.center,
                            style: TextStyle(
                              color: Color.fromARGB(255, 17, 52, 50),
                              fontWeight: FontWeight.normal,
                              fontSize: 20,
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                ))
              ],
            ),
            Column(
              children: [
                (Padding(
                  padding: EdgeInsets.symmetric(horizontal: 100, vertical: 50),
                  child: Card(
                    color: Colors.white,
                    child: Container(
                      padding: EdgeInsets.all(32.0),
                      child: Column(
                        children: <Widget>[
                          const Icon(
                            Icons.account_box,
                            size: 60.0,
                            color: Color(0xFF0f928c),
                          ),
                          Text(
                              "Cadastro de Pacientes",
                              textAlign: TextAlign.center,
                              style: TextStyle(
                                color: Color(0xFF0f928c),
                                fontWeight: FontWeight.bold,
                                fontSize: 30,
                              )),
                          Divider(),
                          Text(
                            "O paciente pode criar sua conta para realizar agendamentos de consultas.",
                            textAlign: TextAlign.center,
                            style: TextStyle(
                              color: Color.fromARGB(255, 17, 52, 50),
                              fontWeight: FontWeight.normal,
                              fontSize: 20,
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                ))
              ],
            ),
            Column(
              children: [
                (Padding(
                  padding: EdgeInsets.symmetric(horizontal: 100, vertical: 50),
                  child: Card(
                    color: Colors.white,
                    child: Container(
                      padding: EdgeInsets.all(32.0),
                      child: Column(
                        children: <Widget>[
                          const Icon(
                            Icons.manage_accounts,
                            size: 60.0,
                            color: Color(0xFF0f928c),
                          ),
                          Text(
                              "Gestão",
                              textAlign: TextAlign.center,
                              style: TextStyle(
                                color: Color(0xFF0f928c),
                                fontWeight: FontWeight.bold,
                                fontSize: 30,
                              )),
                          Divider(),
                          Text(
                            "A empresa que contratou o serviço pode gerenciar inúmeros setores com o Omnimed.",
                            textAlign: TextAlign.center,
                            style: TextStyle(
                              color: Color.fromARGB(255, 17, 52, 50),
                              fontWeight: FontWeight.normal,
                              fontSize: 20,
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                ))
              ],
            ),
            Column(
              children: [
                (Padding(
                  padding: EdgeInsets.symmetric(horizontal: 100, vertical: 50),
                  child: Card(
                    color: Colors.white,
                    child: Container(
                      padding: EdgeInsets.all(32.0),
                      child: Column(
                        children: <Widget>[
                          const Icon(
                            Icons.app_registration,
                            size: 60.0,
                            color: Color(0xFF0f928c),
                          ),
                          Text(
                              "Registro de Consultas",
                              textAlign: TextAlign.center,
                              style: TextStyle(
                                color: Color(0xFF0f928c),
                                fontWeight: FontWeight.bold,
                                fontSize: 30,
                              )),
                          Divider(),
                          Text(
                            "Os médicos e os pacientes podem ter acesso às suas últimas consultas.",
                            textAlign: TextAlign.center,
                            style: TextStyle(
                              color: Color.fromARGB(255, 17, 52, 50),
                              fontWeight: FontWeight.normal,
                              fontSize: 20,
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                ))
              ],
            )
          ]),
        ));
  }
}
