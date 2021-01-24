package main

import (
	"gin-admin-example/core"
	"gin-admin-example/global"
)

func main() {
	global.GAE_VP = core.Viper()
}
