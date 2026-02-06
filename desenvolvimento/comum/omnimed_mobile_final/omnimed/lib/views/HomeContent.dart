import 'package:flutter/material.dart';

class HomeContent extends StatelessWidget {
  const HomeContent({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "OMNIMED",
          style: TextStyle(
            color: Color(0xFF0f928c),
            fontWeight: FontWeight.bold,
          ),
        ),
        centerTitle: true,
        backgroundColor: Colors.white,
        foregroundColor: const Color(0xFF0f928c),
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(16),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            const Text(
              'Bem vindo a OMNIMED',
              style: TextStyle(
                fontSize: 25,
                fontWeight: FontWeight.bold,
              ),
            ),
            const SizedBox(
              height: 15,
            ),
            Image.asset('assets/images/telemedicina.png'),
            const SizedBox(
              height: 15,
            ),
            const Text('A melhor plataforma de telemedicina do mercado.',
                style: TextStyle(
                  fontSize: 16,
                )),
            const SizedBox(
              height: 40,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceAround,
              children: [
                Flexible(
                  child: Container(
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        Icon(
                          Icons.note,
                          color: Colors.cyan.shade700,
                          size: 35,
                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        Text('Organização',
                            style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                                color: Colors.cyan.shade700)),
                        const SizedBox(
                          height: 10,
                        ),
                        const Center(
                            child: Text('A Omnimed é uma empresa organizada',
                                style: TextStyle(fontSize: 16))),
                      ],
                    ),
                  ),
                ),
                Flexible(
                  child: Container(
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        Icon(
                          Icons.home,
                          color: Colors.cyan.shade700,
                          size: 35,
                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        Text('Conforto',
                            style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                                color: Colors.cyan.shade700)),
                        const SizedBox(
                          height: 10,
                        ),
                        const Center(
                            child: Text('Realize suas consultas de forma online',
                                style: TextStyle(fontSize: 16))),
                      ],
                    ),
                  ),
                ),
                Flexible(
                  child: Container(
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        Icon(
                          Icons.accessibility,
                          color: Colors.cyan.shade700,
                          size: 35,
                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        Text('Praticidade',
                            style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                                color: Colors.cyan.shade700)),
                        const SizedBox(
                          height: 10,
                        ),
                        const Center(
                            child: Text('Oferecemos inumeros dados e mais',
                                style: TextStyle(fontSize: 16))),
                      ],
                    ),
                  ),
                ),
              ],
            ),
            const SizedBox(
              height: 40,
            ),
            const Center(
              child: Text(
                'Contato',
                style: TextStyle(
                  fontSize: 20,
                  fontWeight: FontWeight.bold,
                ),
              ),
            ),
            const SizedBox(
              height: 20,
            ),
            const Center(
              child: Text(
                'Rua: Av marginal, 585, Fazenda Nossa Senhora do Jaguari ',
                style: TextStyle(
                  fontSize: 16,
                ),
              ),
            ),
            const SizedBox(
              height: 10,
            ),
            const Center(
              child: Text(
                'Email: omnimed@gmail.com ',
                style: TextStyle(
                  fontSize: 16,
                ),
              ),
            ),
            const SizedBox(
              height: 10,
            ),
            const Center(
              child: Text(
                'Telefone: +55 19987654321',
                style: TextStyle(
                  fontSize: 16,
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
