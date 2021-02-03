package router

import (
	v1 "gin-admin-example/api/v1"
	"gin-admin-example/middleware"

	"github.com/gin-gonic/gin"
)

// InitUserRouter func.
func InitUserRouter(Router *gin.RouterGroup) {
	UserRouter := Router.Group("user").Use(middleware.OperationRecord())
	{
		UserRouter.POST("register", v1.Register)
	}
}
