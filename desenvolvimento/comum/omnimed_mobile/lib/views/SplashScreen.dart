import 'package:easy_splash_screen/easy_splash_screen.dart';
import 'package:flutter/material.dart';
import 'package:omnimed_mobile/views/home.dart';

class SplashScreen extends StatefulWidget {
  const SplashScreen({Key? key}) : super(key: key);

  @override
  State<SplashScreen> createState() => _SplashScreenState();
}

class _SplashScreenState extends State<SplashScreen> {
  @override
  Widget build(BuildContext context) {
    return EasySplashScreen(
      logoSize: 90,
      logo: Image.asset('assets/images/Logo2.png'),
      title: const Text(
        "OMNIMED",
        style: TextStyle(
          fontSize: 26,
          fontWeight: FontWeight.bold,
        ),
      ),
      backgroundColor: Colors.white,
      showLoader: true,
      loaderColor: const Color(0xFF0f928c),
      loadingText: const Text(
        "Carregando...",
        style: TextStyle(
          color: Color(0xFF0f928c),
        ),
      ),
      navigator: const HomeScreen(),
      durationInSeconds: 5,
    );
  }
}
