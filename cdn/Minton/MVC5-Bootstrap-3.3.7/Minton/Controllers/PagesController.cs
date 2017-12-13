
namespace Milton.Controllers
{
    using System.Web.Mvc;

    public class PagesController : Controller
    {
        public ActionResult NotFound()
        {
            return View();
        }

        public ViewResult ServerError()
        {
            return View();
        }

        public ViewResult Blank()
        {
            return View();
        }

        public ViewResult ConfirmMail()
        {
            return View();
        }

        public ViewResult LockScreen()
        {
            return View();
        }

        public ViewResult Login()
        {
            return View();
        }

        public ViewResult RecoverPassword()
        {
            return View();
        }

        public ViewResult Register()
        {
            return View();
        }

        public ViewResult Action()
        {
            return View();
        }

        public ViewResult EmailAlert()
        {
            return View();
        }

        public ViewResult BillingEmail()
        {
            return View();
        }
    }
}