package router

import (
	v1 "gin-admin-example/api/v1"

	"github.com/gin-gonic/gin"
)

// InitBaseRouter func.
func InitBaseRouter(Router *gin.RouterGroup) (R gin.IRoutes) {
	BaseRouter := Router.Group("base")
	{
		BaseRouter.POST("login", v1.Login)
		BaseRouter.POST("captcha", v1.Captcha)
	}
	return BaseRouter
}
