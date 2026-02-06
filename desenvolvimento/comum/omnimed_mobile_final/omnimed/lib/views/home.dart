import 'package:flutter/material.dart';
import 'package:omnimed/views/HomeContent.dart';
import 'package:omnimed/views/mod01/mod01_home.dart';
import 'package:omnimed/views/mod02/mod02_home.dart';
import 'package:omnimed/views/mod03/mod03_home.dart';


class HomeScreen extends StatefulWidget {
  const HomeScreen({Key? key}) : super(key: key);

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  int _selectedIndex = 0;

  int _indiceAtual = 0;
  List<Widget> views = [HomeContent(), HomeMod01(), HomeMod02(), HomeMod03()];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        child: views[_indiceAtual]
        ),
      bottomNavigationBar: BottomNavigationBar(
        currentIndex: _indiceAtual,
        type: BottomNavigationBarType.shifting,
        fixedColor: Colors.black,
        items: const [
          BottomNavigationBarItem(
            label: "Inicio",
            icon: Icon(Icons.home),
            backgroundColor: Color(0xFF0f928c),
          ),
          BottomNavigationBarItem(
            label: "Modulo 1",
            icon: Icon(Icons.looks_one_outlined),
            backgroundColor: Color(0xFF0f928c),
          ),
          BottomNavigationBarItem(
            label: "Modulo 2",
            icon: Icon(Icons.looks_two_outlined),
            backgroundColor: Color(0xFF0f928c),
          ),
          BottomNavigationBarItem(
            label: "Modulo 3",
            icon: Icon(Icons.looks_3_outlined),
            backgroundColor: Color(0xFF0f928c),
          ),
        ],
        onTap: (indice) {
          setState(() {
            _indiceAtual = indice;
          });
        },
      ),
    );
  }
}
