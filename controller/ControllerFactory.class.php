<?php

/**
 *
 */
class ControllerFactory
{

  public function getController($controllerType)
  {
    $controller = NULL;
        switch ($controllerType) {
            case "CASHIER":
                $controller = new CashierControl();
            break;
            case "CLERK":
                $controller = new ClerkControl();
                break;
            case "TRANSPORTER":
                $controller = new TranspoterControl();
                break;
            case "TIMETABLE":
                $controller = new TimetableControl();
                break;
            case "USER":
                $controller = new UserControl();
                break;
            case "PROFILE":
                $controller = new ProfileControl();
                break;
            case "ADMIN":
                $controller = new AdminControl();
                break;
            case "ENGINEER":
                $controller = new EngineerControl();
                break;
            case "SO":
                $controller = new SoControl();
                break;
            case "SYSTEM":
                $controller = new SystemControl();
                break;
            default:
                $controller = NULL;
                break;
        }
    return $controller;
  }
}

?>
