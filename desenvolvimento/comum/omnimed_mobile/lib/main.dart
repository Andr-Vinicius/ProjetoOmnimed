import 'package:omnimed_mobile/route_generator.dart';
import 'package:flutter/material.dart';

void main() {

  runApp(MaterialApp(
    theme: ThemeData(
      primaryColor: const Color(0xFF0f928c),
      scaffoldBackgroundColor: Colors.white,
    ),
    debugShowCheckedModeBanner: false,
    initialRoute: "/",
    onGenerateRoute: RouteGenerator.generateRoute,

  ) );
  
}