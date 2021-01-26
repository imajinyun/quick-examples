package core

import (
	"flag"
	"fmt"
	"gin-admin-example/global"
	"gin-admin-example/util"
	"os"

	"github.com/fsnotify/fsnotify"
	"github.com/spf13/viper"
)

// Viper returns a viper.
func Viper(path ...string) *viper.Viper {
	var config string
	if len(path) == 0 {
		flag.StringVar(&config, "c", "", "choose config file.")
		flag.Parse()
		if config == "" {
			if configEnv := os.Getenv(util.ConfigFile); configEnv == "" {
				config = util.ConfigFile
				fmt.Printf("您正在使用 config 的默认值，config 的路径为 %v\n", util.ConfigFile)
			} else {
				config = configEnv
				fmt.Printf("您正在使用 GAE_CONFIG 环境变量，config 的路径为 %v\n", config)
			}
		} else {
			fmt.Printf("您正在使用命令行的 -c 参数传递值，config 的路径为 %v\n", config)
		}
	} else {
		config = path[0]
		fmt.Printf("您正在使用 func Viper() 传递的值，config 的路径为 %v\n", config)
	}
	v := viper.New()
	v.SetConfigFile(config)
	if err := v.ReadInConfig(); err != nil {
		panic(fmt.Errorf("fatal error config file: %s", err))
	}
	v.WatchConfig()
	v.OnConfigChange(func(e fsnotify.Event) {
		fmt.Println("config file changed:", e.Name)
		if err := v.Unmarshal(&global.GAE_CONFIG); err != nil {
			fmt.Println(err)
		}
	})
	if err := v.Unmarshal(&global.GAE_CONFIG); err != nil {
		fmt.Println(err)
	}
	return v
}
