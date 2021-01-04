import 'package:intl/date_symbol_data_file.dart';
import 'package:intl/intl.dart';

class DateTimeUtils {
  static String get currentDay {
      DateTime now = DateTime.now();
      String d = DateFormat('EEEE').format(now);
      switch(d){
        case 'Monday':
          d = 'Lundi';
          break;
        case 'Tuesday':
          d = 'Mardi';
          break;
        case 'Wednesday':
          d = 'Mercredi';
          break;
        case 'Thursday':
          d = 'Jeudi';
          break;
        case 'Friday':
          d = 'Vendredi';
          break;
        case 'Saturday':
          d = 'Samedi';
          break;
        case 'Sunday':
          d = 'Dimanche';
          break;
      }
      return d;
  }

  static String get currentMonth {
      DateTime now = DateTime.now();
      String d = DateFormat('MMMM').format(now);
      switch(d){
        case 'January':
          d = 'Janvier';
          break;
        case 'February':
          d = 'Février';
          break;
        case 'March':
          d = 'Mars';
          break;
        case 'April':
          d = 'Avril';
          break;
        case 'May':
          d = 'Mai';
          break;
        case 'June':
          d = 'Juin';
          break;
        case 'July':
          d = 'Juillet';
          break;
        case 'August':
          d = 'Août';
          break;
        case 'September':
          d = 'Septembre';
          break;
        case 'October':
          d = 'Octobre';
          break;
        case 'November':
          d = 'Novembre';
          break;
        case 'December':
          d = 'Décembre';
          break;
      }
      return d;
  }

  static String get currentDate {
      DateTime now = DateTime.now();
      return DateFormat('d').format(now);
  }

}
